function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

$(document).ready(function () {
    $("#users").DataTable();
    $("#members").DataTable();
    $(".select2member").select2();

    $(".form-check label,.form-radio label").append(
        '<i class="input-helper"></i>'
    );

    $('input[type=number][max]:not([max=""])').on("input", function (ev) {
        var $this = $(this);
        var maxlength = $this.attr("max").length;
        var value = $this.val();
        if (value && value.length >= maxlength) {
            $this.val(value.substr(0, maxlength));
        }
    });

    // Toggle Hide/Show Select Parent & Born Order on Add/Edit Member Page
    $('input:radio[name="genealogy"]').on("change", function () {
        if ($(this).is(":checked")) {
            const value = $(this).val();
            if (value == "Legal" || value == "Other") {
                $(".hideGene").hide();
            } else {
                $(".hideGene").show();
            }
        }
    });

    // Confirm Deletion (SweetAlert 2)
    $(document).on("click", ".confirmDelete", function () {
        var module = $(this).attr("module");
        var moduleid = $(this).attr("moduleid");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    "Deleted!",
                    capitalizeFirstLetter(module) + " has been deleted.",
                    "success"
                );
                window.location = "/admin/delete-" + module + "/" + moduleid;
            }
        });
    });

    // Update User Status
    $(document).on("click", ".updateUserStatus", function () {
        var status = $(this).children("i").attr("status");
        var user_id = $(this).attr("user_id");
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-user-status",
            data: { status: status, user_id: user_id },
            success: function (resp) {
                if (resp["status"] == 0) {
                    $("#user-" + user_id).html(
                        "<i style='color: #5168f4; font-size:25px;' class='mdi mdi-close-circle-outline' status='inactive'></i>"
                    );
                } else if (resp["status"] == 1) {
                    $("#user-" + user_id).html(
                        "<i style='color: #5168f4; font-size:25px;' class='mdi mdi-check-circle' status='Active'></i>"
                    );
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });

    // Update Member Status
    $(document).on("click", ".updateMemberStatus", function () {
        var status = $(this).children("i").attr("status");
        var member_id = $(this).attr("member_id");
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-member-status",
            data: { status: status, member_id: member_id },
            success: function (resp) {
                if (resp["status"] == 0) {
                    $("#member-" + member_id).html(
                        "<i style='color: #5168f4; font-size:25px;' class='mdi mdi-close-circle-outline' status='inactive'></i>"
                    );
                } else if (resp["status"] == 1) {
                    $("#member-" + member_id).html(
                        "<i style='color: #5168f4; font-size:25px;' class='mdi mdi-check-circle' status='Active'></i>"
                    );
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });
});
