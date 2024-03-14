let isUpdate = false;
let mode = "view";

function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    Toastify({
        text: "Copied the Ref # " + $(element).text(),
        close: true,
        duration: 3000,
    }).showToast();
    $temp.remove();
}

function showToastify(
    text = "",
    type = "success",
    duration = 3000,
    gravity = "bottom"
) {
    let style = {};
    if (type == "error") {
        style = {
            background: "linear-gradient(to right, #df2808, #df5c45)",
        };
    }
    Toastify({
        text,
        close: true,
        duration,
        gravity,
        style,
    }).showToast();
}
$("#new_status").select2({
    placeholder: "Select Status",
});

function editForm() {
    isUpdate = true;
    mode = "edit";
    $("#col-logs").addClass("d-none");
    $(".inputs").prop("disabled", false).removeClass("is-invalid");
    $("#saveBtn, #closeBtn,#messageDiv").removeClass("d-none");
    $("#mainForm").removeClass("was-validated");
    $(
        "#editBtn, #newBtn, #deleteBtn, #bulkAssignBtn, #dropdownMenuLink1"
    ).addClass("d-none");
    $("#editBtn").addClass("d-none");
    if (mode == "view") {
        $("form .form-card .card-body").addClass("bg-viewmode");
    } else {
        $("form .form-card .card-body").removeClass("bg-viewmode");
    }
}

function viewForm() {
    isUpdate = true; //set isUpdate to true
    mode = "view";
    $("#mainForm").trigger("reset");
    $(".inputs")
        .prop("disabled", true)
        .removeClass("is-invalid")
        .prop("readonly", false)
        .trigger("change");
    $("#editBtn").removeClass("d-none");
    $("#closeBtn").removeClass("d-none");
    $("#formDiv").removeClass("d-none");
    $("#saveBtn").addClass("d-none");
    if (mode == "view") {
        $("form .form-card .card-body").addClass("bg-viewmode");
    } else {
        $("form .form-card .card-body").removeClass("bg-viewmode");
    }
}
function urldecode(str) {
    return decodeURIComponent((str + "").replace(/\+/g, "%20"));
}
function QueryStringToJSON(str) {
    str = decodeURI(str);
    var pairs = str.split("&");
    var result = {};
    pairs.forEach(function (pair) {
        pair = pair.split("=");
        var name = pair[0];
        var value = pair[1];
        if (name.length)
            if (result[name] !== undefined) {
                if (!result[name].push) {
                    result[name] = [result[name]];
                }
                result[name].push(value || "");
            } else {
                result[name] = value || "";
            }
    });
    return result;
}

function newForm() {
    mode = "create";
    isUpdate = false;
    $("#mainForm").trigger("reset");
    $("#saveBtn").html("Save");
    $("select.inputs").val("").trigger("change");

    $(".inputs")
        .removeClass("is-invalid")
        .prop("disabled", false)
        .prop("readonly", false)
        .trigger("change");
    $("#formDiv,#saveBtn,#closeBtn").removeClass("d-none");
    $("#editBtn").addClass("d-none");
    $("#newBtn").addClass("d-none");
    $("#editBtn").addClass("d-none");
    if (mode == "view") {
        $("form .form-card .card-body").addClass("bg-viewmode");
    } else {
        $("form .form-card .card-body").removeClass("bg-viewmode");
    }
}

function closeForm() {
    $("#closeBtn,#formDiv,#saveBtn,#editBtn").addClass("d-none");
    $("#mainForm").trigger("reset");
    $("#newBtn").removeClass("d-none");
    mode = "view";
    $("form .card").removeClass("bg-viewmode");
}

function submitFrom() {
    $("#mainForm").submit();
}

$(".makeslug").keyup("input", function () {
    let name = $(this).val();
    let slug = name.replace(/\s+/g, "-").toLowerCase();
    $("#slug").val(slug);
    $("#slug").attr("readonly", true);
});

!(function () {
    // form validation used from theme
    "use strict";
    window.addEventListener(
        "load",
        function () {
            var t = document.getElementsByClassName("needs-validation");
            t &&
                Array.prototype.filter.call(t, function (t) {
                    t.addEventListener(
                        "submit",
                        function (e) {
                            !1 === t.checkValidity() &&
                                (e.preventDefault(), e.stopPropagation()),
                                t.classList.add("was-validated");
                        },
                        !1
                    );
                });
        },
        !1
    );
})();
function scrollTop(speed = "fast") {
    $("html, body").animate({ scrollTop: 0 }, speed);
}
function highlightRow(row) {
    row.removeClass("selected");
    dataTable.$("tr.selected").removeClass("selected");
    row.addClass("selected");
} // highlightRow

function updateMultiOption() {
    var countCheckedCheckboxes = $('input[name="chk_child"]:checked').length;
    console.log(countCheckedCheckboxes);
    $("#bulk_leads_count").html(countCheckedCheckboxes);
    $("#count_selected").html(countCheckedCheckboxes);
    if (countCheckedCheckboxes >= 1) {
        // check the url and get the model name from the url
        let url = window.location.href;
        let model = url.substr(url.lastIndexOf("/") + 1);
        model = model.split("?")[0];
        let options = "";
        if (model === "leads" || model === "datapools" ) {
            options = `<a class="dropdown-item" href="javascript:;" onclick="archiveMultiple()">Archive</a>`;
        }

        if ($(".multi_options").length === 0) {
            $(
                `<div class="multi_options" style="display:inline-block; margin-left:10px;">
                              <div class="btn-group">
                                <button class="btn btn-primary btn-sm dropdown-toggle action-bulk" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Bulk Actions
                                </button>
                                <div class="dropdown-menu">

                                <a class="dropdown-item" href="javascript:;" onclick="updateStatus()">Update Status</a>` +
                    options +
                    `<a class="dropdown-item" href="javascript:;" onclick="deleteMultiple()">Delete</a>
                    </div>
                    </div>
               </div>`
            ).insertAfter(".dataTables_length");
        }
    } else {
        $(".multi_options").remove();
    }
}
function updateStatus() {
    $("#update-bulk-status").modal("show");
}
function updateStatusPost() {
    var url = window.location.href;
    var model = url.substr(url.lastIndexOf("/") + 1);
    var ids_array = [];
    var status = $("#new_status").val();
    document.getElementsByName("chk_child").forEach(function (e) {
        if (e.checked) {
            var t = e.value;
            ids_array.push(t);
        }
    });
    if (ids_array.length > 0 && status != "") {
        Swal.fire({
            title: "Attention!!",
            text: "You are trying to update status of record(s).",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, update it!",
            cancelButtonText: "No, cancel!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: "ajax/update-bulk-statuses",
                    type: "POST",
                    dataType: "json",
                    data: {
                        ids: ids_array,
                        status: status,
                        model: model,
                    },
                    success: function (result) {
                        if (result.status == "200") {
                            showToastify(result.msg, "success");
                            $(".multi_options").remove();
                            $("#update-bulk-status").modal("hide");
                            dataTable.row().draw();
                        } else {
                            Swal.fire("Whoops", result.msg, "error");
                            showToastify(result.msg, "error");
                        }
                    },
                    error: function (result) {
                        console.log(result);
                    },
                });
                document.getElementById("checkAll").checked = false;
            } else {
                showToastify("Record is safe!", "info");
            }
        });
    } else {
        showToastify("Please select at least one checkbox", "error");
    }
}

function archiveMultiple() {
    let url = window.location.href;
    var model_name = url.substr(url.lastIndexOf("/") + 1);
    model_name = model_name.split("?")[0];
    var ids_array = [];
    document.getElementsByName("chk_child").forEach(function (e) {
        if (e.checked) {
            var t = e.value;
            ids_array.push(t);
        }
    });
    if (ids_array.length > 0) {
        Swal.fire({
            title: "Attention!!",
            text: "You are trying to Archive record(s).",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Archive it!",
            cancelButtonText: "No, cancel!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: "ajax/bulk-archive",
                    type: "POST",
                    dataType: "json",
                    data: {
                        ids: ids_array,
                        model: model_name,
                    },
                    success: function (result) {
                        if (result.status == "200") {
                            showToastify(result.msg, "success");
                            $(".multi_options").remove();
                            dataTable.row().draw();
                        } else {
                            Swal.fire("Whoops", result.msg, "error");
                            showToastify(result.msg, "error");
                        }
                    },
                    error: function (result) {
                        console.log(result);
                    },
                });
                document.getElementById("checkAll").checked = false;
            } else {
                showToastify("Record is safe!", "info");
            }
        });
    } else {
        showToastify("Please select at least one checkbox", "error");
    }
}

function toggleAdvanceSearch() {
    $("#collapseFilterForm").toggleClass("show");
}

function checkAllCheckBoxes() {
    var checkAll = document.getElementById("checkAll");
    checkAll &&
        (checkAll.onclick = function () {
            var e = document.querySelectorAll(
                '.form-check-all input[name="chk_child"]'
            );
            1 == checkAll.checked
                ? e.forEach(function (e) {
                      e.checked = !0;
                  })
                : e.forEach(function (e) {
                      e.checked = !1;
                  });
        });
}



$(document).ready(function () {
    // Get the current URL
    var currentUrl = window.location.href;

    // Iterate through each nav-link in the menu-dropdown
    $(".nav-link").each(function () {
        var linkUrl = $(this).attr("href");

        // Check if the current URL contains the link's URL
        if (currentUrl == linkUrl) {
            // Add the 'active' class to the corresponding nav-link
            $(this).addClass("active");

            // Add the 'show' class to the parent menu-dropdown
            $(this).closest(".menu-dropdown").addClass("show");

            // Set aria-expanded to true for the parent menu-link
            $(this)
                .closest(".menu-dropdown")
                .siblings(".nav-link.menu-link")
                .attr("aria-expanded", true);
            $(this)
                .closest(".menu-dropdown")
                .siblings(".nav-link.menu-link")
                .addClass("show");
        }
    });
});

function formatInputValue(input) {
    var inputValue = input.val();
    var unformattedValue = inputValue.replace(/,/g, "");
    var numericValue = parseFloat(unformattedValue);

    if (!isNaN(numericValue)) {
        input.val(numericValue.toLocaleString());
    }
}

function formatLabelsAndPlaceholdersInForms() {
    const forms = document.querySelectorAll("form");

    forms.forEach((form) => {
        const labels = form.querySelectorAll("label");
        const inputs = form.querySelectorAll("input, textarea");

        labels.forEach((label) => {
            let labelText = label.innerText;
            labelText = labelText.replace(/_id$/i, "");
            labelText = labelText
                .replace(/_/g, " ")
                .replace(/\b\w/g, (char) => char.toUpperCase());
            label.innerText = labelText;
        });

        inputs.forEach((input) => {
            const placeholderText = input.getAttribute("placeholder");
            if (placeholderText) {
                let formattedPlaceholder = placeholderText
                    .replace(/_/g, " ")
                    .replace(/\b\w/g, (char) => char.toUpperCase());
                formattedPlaceholder = formattedPlaceholder.replace(
                    /_id$/i,
                    ""
                );
                input.setAttribute("placeholder", formattedPlaceholder);
            }
        });
    });
}

$('input[name="input"]').tagsinput({
    trimValue: true,
    confirmKeys: [13, 44, 32],
    focusClass: "my-focus-class",
});

function getActivityLog(model,position) {
    let id = $("#id").val();
    $.ajax({
        'headers': {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "ajax/get-activity-log",
        type: 'POST',
        dataType: 'html',
        data: {
            'parentable_id': id,
            'parentable_type': model
        },
        success: function(result) {
            // $('#load-activity-log').html(result);
            $(`#${position}`).next('#load-activity-log').remove();
            $(`#${position}`).after(result);


        },
        error: function(result) {
            console.log(result);
        }
    });
}


function getNotes(model,position) {
    let id = $("#id").val();
    $.ajax({
        'headers': {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "ajax/get-notes",
        type: 'POST',
        dataType: 'html',
        data: {
            'parentable_id': id,
            'parentable_type': model
        },
        success: function(result) {
            $(`#${position}`).next('#load-notes-log').remove();
            $(`#${position}`).after(result);
        },
        error: function(result) {
            console.log(result);
        }
    });
}
