"use strict";
var KTUsersUpdateRole = function() {
    const t = document.getElementById("kt_modal_update_role")
      , e = t.querySelector("#kt_modal_update_role_form")
      , n = new bootstrap.Modal(t);
    return {
        
        setRoleOnPage: function(returnData) {
            (() => {
                $("#badge_role").text(returnData.group_name);
            })()
        },
        
        displayReturnSuccess: function() {
            return Swal.fire({
                text: "Form has been successfully submitted!",
                icon: "success",
                buttonsStyling: !1,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })
        },

        displayReturnError: function() {
            return Swal.fire({
                text: "Une erreur est survenue",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "Fermer",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })
        },

        displayFormNotCancelled: function() {
            console.info("in displayFormNotCancelled");
            Swal.fire({
                text: "Your form has not been cancelled!.",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })
        },
        
        askCancel: function() {
            return Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: !0,
                buttonsStyling: !1,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            })
        },
        

        init: function() {
            (()=>{
                t.querySelector('[data-kt-users-modal-action="close"]').addEventListener("click", (t=>{
                    t.preventDefault(),
                    KTUsersUpdateRole.askCancel().then((function(t) {
                        t.value ? (e.reset(),
                        n.hide()) : "cancel" === t.dismiss //  && KTUsersUpdateRole.displayFormNotCancelled()
                    }
                    ))
                }
                )),
                t.querySelector('[data-kt-users-modal-action="cancel"]').addEventListener("click", (t=>{
                    t.preventDefault(),
                    KTUsersUpdateRole.askCancel().then((function(t) {
                        t.value ? (e.reset(),
                        n.hide()) : "cancel" === t.dismiss// && KTUsersUpdateRole.displayFormNotCancelled()
                    }
                    ))
                }
                ));
                const o = t.querySelector('[data-kt-users-modal-action="submit"]');
                o.addEventListener("click", (function(t) {
                    t.preventDefault(),

                    o.setAttribute("data-kt-indicator", "on"),
                    o.disabled = !0,

                    
                    $.ajax({
                        url: '/employee/save/role',
                        type: 'post',
                        data: $("#kt_modal_update_role_form").serialize(),
                        dataType: 'JSON',
                        success: function(response){

                            if (response.success == "1") {
                                o.removeAttribute("data-kt-indicator"),
                                o.disabled = !1,
                                KTUsersUpdateRole.displayReturnSuccess().then((function(t) {
                                    t.isConfirmed && n.hide()
                                    KTUsersUpdateRole.setRoleOnPage(response.data);
                                }
                                ))
                            }
                            else {
                                o.removeAttribute("data-kt-indicator"),
                                o.disabled = !1,
                                KTUsersUpdateRole.displayReturnError().then((function(t) {
                                    t.isConfirmed && n.hide()
                                }
                                ))
                            }
                            
                        }
                    })
                    
                }
                ))
            }
            )()
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTUsersUpdateRole.init()
}
));
