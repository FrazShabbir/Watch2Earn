<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function getUsers(Request $request)
    {
        $query = $request->get('q');
        $data = User::where('first_name', 'like', '%' . $query . '%')
            ->where('last_name', 'like', '%' . $query . '%')
            ->where('phone', 'like', '%' . $query . '%')
            ->where('email', 'like', '%' . $query . '%')->get();
        return response()->json($data);
    }
    public function getNationalities(Request $request)
    {
        $query = $request->get('q');
        $data = \App\Models\Country::where('nationality', 'like', '%' . $query . '%')->orWhere('name', 'like', '%' . $query . '%')
            ->get();
        return response()->json($data);

    }

    public function getTags(Request $request)
    {
        $query = $request->get('q');

        $data = \App\Models\Media::get();

        $allTags = collect();

        foreach ($data as $media) {
            $tags = json_decode($media->tags, true); // Assuming tags are stored in the 'tags' column
            $allTags = $allTags->merge($tags);
        }

        // Get unique tags
        $uniqueTags = $allTags->unique();
        // dd($uniqueTags);
        if ($uniqueTags) {
            return response()->json($uniqueTags);
        }

    }

    public function bulkUpdateStatus(Request $request)
    {
        //    dd(getModel($request->model));
        $request->validate([
            'model' => 'required',
            'ids' => 'required',
            'status' => 'required',
        ]);

        $parent = getModel($request->model);

        $data = $parent::whereIn('id', $request->ids)->update(['status' => $request->status]);
        return response()->json(['status' => '200', 'msg' => 'Status updated successfully']);
    }

    public function bulkArchive(Request $request)
    {
        $request->validate([
            'model' => 'required',
            'ids' => 'required',
        ]);
        $parent = getModel($request->model);
        $data = $parent::whereIn('id', $request->ids)->update(['is_archived' => 1]);
        return response()->json(['status' => '200', 'msg' => 'Record Archived successfully']);
    }

    public function getActivityLog(Request $request)
    {
        $request->validate([
            'parentable_type' => 'required',
            'parentable_id' => 'required',
        ]);
        $logs = ActivityLog::where('parentable_type', $request->parentable_type)->where('parentable_id', $request->parentable_id)->orderBy('id', 'desc')->get();
        return view('backend.global.activities')
            ->with('logs', $logs);
    }

    public function getNotes(Request $request)
    {
        $request->validate([
            'parentable_type' => 'required',
            'parentable_id' => 'required',
        ]);
        $notes = Note::where('parentable_type', $request->parentable_type)->where('parentable_id', $request->parentable_id)->get();
        return view('backend.global.notes')
            ->with('notes', $notes);
    }

    public function storeNote(Request $request)
    {
        $request->validate([
            'parentable_type' => 'required',
            'parentable_id' => 'required',
            'note' => 'required',
        ]);
        $log = new Note();
        $log->parentable_type = $request->parentable_type;
        $log->parentable_id = $request->parentable_id;
        $log->note = $request->note;
        $log->created_by_id = auth()->user()->id;
        $log->save();
        return response()->json(['status' => '200', 'msg' => 'Notes added successfully']);
    }

    public function getCurrencies(Request $request)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.binance.com/bapi/composite/v1/public/promo/cmc/cryptocurrency/listings/latest?limit=100&start=1',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'authority: www.binance.com',
                'accept: */*',
                'accept-language: en-US,en;q=0.9,ur;q=0.8',
                'bnc-uuid: 26bb47be-c324-4feb-a6de-8677d09a2a6f',
                'clienttype: web',
                'content-type: application/json',
                'cookie: theme=dark; bnc-uuid=26bb47be-c324-4feb-a6de-8677d09a2a6f; sensorsdata2015jssdkcross=%7B%22distinct_id%22%3A%2218e0890488b1daf-0af218050e89cc-1d525637-1484784-18e0890488c2da%22%2C%22first_id%22%3A%22%22%2C%22props%22%3A%7B%22%24latest_traffic_source_type%22%3A%22%E7%9B%B4%E6%8E%A5%E6%B5%81%E9%87%8F%22%2C%22%24latest_search_keyword%22%3A%22%E6%9C%AA%E5%8F%96%E5%88%B0%E5%80%BC_%E7%9B%B4%E6%8E%A5%E6%89%93%E5%BC%80%22%2C%22%24latest_referrer%22%3A%22%22%7D%2C%22identities%22%3A%22eyIkaWRlbnRpdHlfY29va2llX2lkIjoiMThlMDg5MDQ4OGIxZGFmLTBhZjIxODA1MGU4OWNjLTFkNTI1NjM3LTE0ODQ3ODQtMThlMDg5MDQ4OGMyZGEifQ%3D%3D%22%2C%22history_login_id%22%3A%7B%22name%22%3A%22%22%2C%22value%22%3A%22%22%7D%2C%22%24device_id%22%3A%2218e0890488b1daf-0af218050e89cc-1d525637-1484784-18e0890488c2da%22%7D; userPreferredCurrency=USD_USD; BNC_FV_KEY=33ffd28f8958a3c4b30592c009987f0f3b3ddd82; source=referral; campaign=www.binance.com; changeBasisTimeZone=; _gcl_au=1.1.1277528216.1709540695; lang=en; _gid=GA1.2.1280692270.1710927836; BNC_FV_KEY_T=101-0%2FMPkBRNCoghFR7kESD38FU3sswUVB7d8NukME0Dr7bU9hKlVWXxsdjBGYYosODKW4ZUVSJiFZm1%2FW6oYGHNag%3D%3D-Lvhi05qDJAl4XdHECkDPqA%3D%3D-13; BNC_FV_KEY_EXPIRE=1710949437694; OptanonConsent=isGpcEnabled=0&datestamp=Wed+Mar+20+2024+13%3A44%3A05+GMT%2B0400+(Gulf+Standard+Time)&version=202402.1.0&browserGpcFlag=0&isIABGlobal=false&hosts=&consentId=4fc5e2ab-9817-4162-9803-4e1fb0f6cc30&interactionCount=1&landingPath=NotLandingPage&groups=C0001%3A1%2CC0003%3A1%2CC0004%3A1%2CC0002%3A1&AwaitingReconsent=false&isAnonUser=1; _ga=GA1.2.1299248951.1709540657; _gat=1; kifcc_144321=4; _ga_3WP50LGEEC=GS1.1.1710927837.3.1.1710928084.60.0.0',
                'csrftoken: d41d8cd98f00b204e9800998ecf8427e',
                'device-info: eyJzY3JlZW5fcmVzb2x1dGlvbiI6Ijk4MiwxNTEyIiwiYXZhaWxhYmxlX3NjcmVlbl9yZXNvbHV0aW9uIjoiODgyLDE1MTIiLCJzeXN0ZW1fdmVyc2lvbiI6Ik1hYyBPUyAxMC4xNS43IiwiYnJhbmRfbW9kZWwiOiJ1bmtub3duIiwic3lzdGVtX2xhbmciOiJlbi1VUyIsInRpbWV6b25lIjoiR01UKzA0OjAwIiwidGltZXpvbmVPZmZzZXQiOi0yNDAsInVzZXJfYWdlbnQiOiJNb3ppbGxhLzUuMCAoTWFjaW50b3NoOyBJbnRlbCBNYWMgT1MgWCAxMF8xNV83KSBBcHBsZVdlYktpdC81MzcuMzYgKEtIVE1MLCBsaWtlIEdlY2tvKSBDaHJvbWUvMTIyLjAuMC4wIFNhZmFyaS81MzcuMzYiLCJsaXN0X3BsdWdpbiI6IlBERiBWaWV3ZXIsQ2hyb21lIFBERiBWaWV3ZXIsQ2hyb21pdW0gUERGIFZpZXdlcixNaWNyb3NvZnQgRWRnZSBQREYgVmlld2VyLFdlYktpdCBidWlsdC1pbiBQREYiLCJjYW52YXNfY29kZSI6ImU3MjcyNDgyIiwid2ViZ2xfdmVuZG9yIjoiR29vZ2xlIEluYy4gKEFwcGxlKSIsIndlYmdsX3JlbmRlcmVyIjoiQU5HTEUgKEFwcGxlLCBBTkdMRSBNZXRhbCBSZW5kZXJlcjogQXBwbGUgTTIgUHJvLCBVbnNwZWNpZmllZCBWZXJzaW9uKSIsImF1ZGlvIjoiMTI0LjA0MzQ0OTY4NDc1MTk4IiwicGxhdGZvcm0iOiJNYWNJbnRlbCIsIndlYl90aW1lem9uZSI6IkFzaWEvRHViYWkiLCJkZXZpY2VfbmFtZSI6IkNocm9tZSBWMTIyLjAuMC4wIChNYWMgT1MpIiwiZmluZ2VycHJpbnQiOiJkNGM1N2UwNGY0MmRhMmNiNTBiNzY1OTZkNDY1YjM4OCIsImRldmljZV9pZCI6IiIsInJlbGF0ZWRfZGV2aWNlX2lkcyI6IiJ9',
                'fvideo-id: 33ffd28f8958a3c4b30592c009987f0f3b3ddd82',
                'fvideo-token: PzONb7IgmquNUzFUigDXROliJeQajRmKpsWB0MLEVO0sbW6qkw/ablQq+xliIdP9gKZYRVNq3LpxKr6MBt6J8ouEhte1VamJu3IqWqAYcJdQsC3rlB6vzq2yM6hjGFeAvxldKIM7rWjVkcSRQ9HkPGYMk2/ZximNyXOhFcR/ScKNw8dSFvKVdYjU2uqIqPSz0=11',
                'lang: en',
                'referer: https://www.binance.com/en/price/top-losing-crypto',
                'sec-ch-ua: "Chromium";v="122", "Not(A:Brand";v="24", "Google Chrome";v="122"',
                'sec-ch-ua-mobile: ?0',
                'sec-ch-ua-platform: "macOS"',
                'sec-fetch-dest: empty',
                'sec-fetch-mode: cors',
                'sec-fetch-site: same-origin',
                'user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36',
                'x-passthrough-token: ',
                'x-trace-id: c98eefc0-5f98-425c-be31-f24145c2bd52',
                'x-ui-request-trace: c98eefc0-5f98-425c-be31-f24145c2bd52',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true)['data']['body']['data'];
        // dd($data);
        return view('user.currencies.all_currencies')
            ->with('data', $data);

    }

    public function getForex(Request $request)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.binance.com/bapi/asset/v1/public/asset-service/product/currency',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'authority: www.binance.com',
                'accept: */*',
                'accept-language: en-US,en;q=0.9,ur;q=0.8',
                'bnc-uuid: b5745879-d7e5-46dc-9f51-52c780a0d35f',
                'clienttype: web',
                'content-type: application/json',
                'cookie: __BNC_USER_DEVICE_ID__={"50ca5b968428dac25a71c1eabd70fedf":{"date":1681063942473,"value":"1681063942407wpQQ6hdx0kL4nhEIF4y"}}; bnc-uuid=b5745879-d7e5-46dc-9f51-52c780a0d35f; sensorsdata2015jssdkcross=%7B%22distinct_id%22%3A%2218db3b1f53d1196-0012ae99879ecc19-1e525637-1296000-18db3b1f53e1c0d%22%2C%22first_id%22%3A%22%22%2C%22props%22%3A%7B%22%24latest_traffic_source_type%22%3A%22%E7%9B%B4%E6%8E%A5%E6%B5%81%E9%87%8F%22%2C%22%24latest_search_keyword%22%3A%22%E6%9C%AA%E5%8F%96%E5%88%B0%E5%80%BC_%E7%9B%B4%E6%8E%A5%E6%89%93%E5%BC%80%22%2C%22%24latest_referrer%22%3A%22%22%7D%2C%22identities%22%3A%22eyIkaWRlbnRpdHlfY29va2llX2lkIjoiMThkYjNiMWY1M2QxMTk2LTAwMTJhZTk5ODc5ZWNjMTktMWU1MjU2MzctMTI5NjAwMC0xOGRiM2IxZjUzZTFjMGQifQ%3D%3D%22%2C%22history_login_id%22%3A%7B%22name%22%3A%22%22%2C%22value%22%3A%22%22%7D%2C%22%24device_id%22%3A%2218db3b1f53d1196-0012ae99879ecc19-1e525637-1296000-18db3b1f53e1c0d%22%7D; userPreferredCurrency=USD_USD; BNC_FV_KEY=335ed1203a18ad668017a3d52e314749759419e2; theme=dark; source=referral; campaign=www.binance.com; changeBasisTimeZone=; lang=en; _gid=GA1.2.1381706514.1710627372; _gat_UA-162512367-1=1; _gat=1; BNC_FV_KEY_T=101-qVcAJ4aflN1uZROS8u6CO62l5kg10dNhw0yK%2B1eEEaTqNesCaKdRI%2FxIg0PV%2B40TC5NAclRNnpzFmcZg0XtYYQ%3D%3D-Sw0%2Bj1gL2wVpdLjhrvoYpw%3D%3D-78; BNC_FV_KEY_EXPIRE=1710648977629; kifcc_144321=1; _ga_3WP50LGEEC=GS1.1.1710627375.2.1.1710627386.49.0.0; _ga=GA1.1.33162922.1708116800; OptanonConsent=isGpcEnabled=0&datestamp=Sun+Mar+17+2024+02%3A16%3A26+GMT%2B0400+(Gulf+Standard+Time)&version=202402.1.0&browserGpcFlag=0&isIABGlobal=false&hosts=&consentId=1fbf2ff0-64e2-41a7-a5e1-fc8f32f2a842&interactionCount=1&landingPath=NotLandingPage&groups=C0001%3A1%2CC0003%3A1%2CC0004%3A1%2CC0002%3A1&AwaitingReconsent=false&isAnonUser=1',
                'csrftoken: d41d8cd98f00b204e9800998ecf8427e',
                'device-info: eyJzY3JlZW5fcmVzb2x1dGlvbiI6IjkwMCwxNDQwIiwiYXZhaWxhYmxlX3NjcmVlbl9yZXNvbHV0aW9uIjoiODEyLDE0NDAiLCJzeXN0ZW1fdmVyc2lvbiI6Ik1hYyBPUyAxMC4xNS43IiwiYnJhbmRfbW9kZWwiOiJ1bmtub3duIiwic3lzdGVtX2xhbmciOiJlbi1VUyIsInRpbWV6b25lIjoiR01UKzA0OjAwIiwidGltZXpvbmVPZmZzZXQiOi0yNDAsInVzZXJfYWdlbnQiOiJNb3ppbGxhLzUuMCAoTWFjaW50b3NoOyBJbnRlbCBNYWMgT1MgWCAxMF8xNV83KSBBcHBsZVdlYktpdC81MzcuMzYgKEtIVE1MLCBsaWtlIEdlY2tvKSBDaHJvbWUvMTIyLjAuMC4wIFNhZmFyaS81MzcuMzYiLCJsaXN0X3BsdWdpbiI6IlBERiBWaWV3ZXIsQ2hyb21lIFBERiBWaWV3ZXIsQ2hyb21pdW0gUERGIFZpZXdlcixNaWNyb3NvZnQgRWRnZSBQREYgVmlld2VyLFdlYktpdCBidWlsdC1pbiBQREYiLCJjYW52YXNfY29kZSI6ImU3MjcyNDgyIiwid2ViZ2xfdmVuZG9yIjoiR29vZ2xlIEluYy4gKEFwcGxlKSIsIndlYmdsX3JlbmRlcmVyIjoiQU5HTEUgKEFwcGxlLCBBTkdMRSBNZXRhbCBSZW5kZXJlcjogQXBwbGUgTTEsIFVuc3BlY2lmaWVkIFZlcnNpb24pIiwiYXVkaW8iOiIxMjQuMDQzNDQ5Njg0NzUxOTgiLCJwbGF0Zm9ybSI6Ik1hY0ludGVsIiwid2ViX3RpbWV6b25lIjoiQXNpYS9EdWJhaSIsImRldmljZV9uYW1lIjoiQ2hyb21lIFYxMjIuMC4wLjAgKE1hYyBPUykiLCJmaW5nZXJwcmludCI6ImQ2NDhmMzk1NmEyOGVlNzUwYWZkZTY4MzVhMTYwYzBjIiwiZGV2aWNlX2lkIjoiIiwicmVsYXRlZF9kZXZpY2VfaWRzIjoiMTY4MTA2Mzk0MjQwN3dwUVE2aGR4MGtMNG5oRUlGNHkifQ==',
                'fvideo-id: 335ed1203a18ad668017a3d52e314749759419e2',
                'fvideo-token: QFSOpgMluNLje0dL8aHE9BaDCGmfGZzVSWcjGYFlX7eG/z9RQSWIYw1nE+IrgL+xp93sHaX9PYaiNW8JcAWB0eP9BS9v6ZBwY+PojYO5AT2rtATy/bCs5fQB3V6Ffoi94gqGAkBak2x16S0a+vR8bykz8n2VRMA+Zd2KbtURavCTL0qLbxvlkPTnhpViDhfNQ=17',
                'lang: en',
                'referer: https://www.binance.com/en/markets/overview',
                'sec-ch-ua: "Chromium";v="122", "Not(A:Brand";v="24", "Google Chrome";v="122"',
                'sec-ch-ua-mobile: ?0',
                'sec-ch-ua-platform: "macOS"',
                'sec-fetch-dest: empty',
                'sec-fetch-mode: cors',
                'sec-fetch-site: same-origin',
                'user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36',
                'x-passthrough-token: ',
                'x-trace-id: f099a1bd-b8c7-4ef8-bd65-f860439339a1',
                'x-ui-request-trace: f099a1bd-b8c7-4ef8-bd65-f860439339a1',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $datas = json_decode($response, true)['data'];
        // dd($data);
        return view('user.currencies._forex')
            ->with('datas', $datas);

    }

}
