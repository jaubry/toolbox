"use strict";
var target = document.querySelector("body");
var blockUI = new KTBlockUI(target, {
    overlayClass: "bg-warning bg-opacity-25",
});


var KTUsersStores = function() {
    const t = document.getElementById("kt_modal_stores")
      ,  f = t.querySelector("#kt_modal_stores_form")
      , e = new bootstrap.Modal(t);
    return {
        
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

        
        setStoresOnPage: function(returnData) {
            (() => {
                $("#lst_stores span").remove();
                for (let i=0; i<returnData.length; i++) {
                    $("#lst_stores").append('<span class="badge badge-light-info fs-7 m-1">' + returnData[i] + '</span>');
                }
            })()
        },

        init: function() {
            t.querySelector('[data-kt-users-modal-action="close"]').addEventListener("click", (t=>{
                t.preventDefault(),
                Swal.fire({
                    text: "Are you sure you would like to close?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, close it!",
                    cancelButtonText: "No, return",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light"
                    }
                }).then((function(t) {
                    t.value && e.hide()
                }
                ))
            }
            )),
            t.querySelector('[data-kt-users-modal-action="cancel"]').addEventListener("click", (t=>{
                t.preventDefault(),
                Swal.fire({
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
                }).then((function(t) {
                    t.value ? (f.reset(),
                    n.hide()) : "cancel" === t.dismiss && Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    })
                }
                ))
            }
            ));
            const a = t.querySelector('[data-kt-users-modal-action="submit"]');
            a.addEventListener("click", (function(t) {
                t.preventDefault(),
                $.ajax({
                    url: '/employee/save/stores',
                    type: 'get',
                    data: $("#kt_modal_stores_form").serialize(),
                    dataType: 'JSON',
                    success: function(response){
                        console.info(response);
                        
                        if (response.success == "1") {
                            a.removeAttribute("data-kt-indicator"),
                            a.disabled = !1,
                            KTUsersStores.displayReturnSuccess().then((function(t) {
                                t.isConfirmed && e.hide()
                                KTUsersStores.setStoresOnPage(response.stores);
                            }
                            ))
                        }
                        else {
                            a.removeAttribute("data-kt-indicator"),
                            a.disabled = !1,
                            Swal.fire({
                                text: "Une erreur est survenue",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Fermer",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then((function(t) {
                                t.isConfirmed && e.hide()
                            }
                            ))
                        }
                        
                    }
                })
            }
            ))
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTUsersStores.init()
}
));
