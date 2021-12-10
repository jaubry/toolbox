"use strict";
var KTUsersUpdateDetails = function() {
    const t = document.getElementById("kt_modal_update_details"),
        ui = t.querySelector("#kt_modal_update_user_user_info"),
        e = t.querySelector("#kt_modal_update_user_form"),
        n = new bootstrap.Modal(t);
    var o;
    return {

        validate: function() {
            (() => {
                console.info("before");
                o && o.validate();
                console.info("after");
            })()
        },

        setDetailsOnPage: function(returnData) {
            (() => {
                //var lastname = ui.querySelector("#lastname");
                //console.info(lastname.value);
                returnData.lastname != "" && $("#txtLastname").text(returnData.lastname);
                returnData.firstname != "" && $("#txtFirstname").text(returnData.firstname);
                returnData.mail != "" && $("#txtMail").text(returnData.mail);
                if (returnData.active != "") {
                    if (returnData.active == "1") {
                        $("#txtActive").html('<span class="ms-2 badge badge-light-success fw-bold">Oui</span>');
                    } else {
                        $("#txtActive").html('<span class="ms-2 badge badge-light-danger fw-bold">Non</span>');
                    }
                }
            })()
        },

        displayFormNotCancelled: function() {
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

        init: function() {
            (() => {
                o = FormValidation.formValidation(e, {
                    fields: {
                        lastname: {
                            validators: {
                                notEmpty: {
                                    message: "Obligatoire"
                                }
                            }
                        },
                        firstname: {
                            validators: {
                                notEmpty: {
                                    message: "Obligatoire"
                                }
                            }
                        },
                        mail: {
                            validators: {
                                notEmpty: {
                                    message: "Obligatoire"
                                },
                                emailAddress: {
                                    message: 'Merci de saisir une adresse email valide'
                                },                                
                                remote: {
                                    data: {
                                        mail: t.value,
                                        id_employee: $("#kt_modal_update_user_form #id_employee").val()
                                    },
                                    message: 'Cet email existe déjà',
                                    method: 'POST',
                                    url: '/employee/check-email-unique',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "is-invalid",
                            eleValidClass: ""
                        }),
                        icon: new FormValidation.plugins.Icon({
                            valid: 'fa fa-check',
                            invalid: 'fa fa-times',
                            validating: 'fa fa-refresh',
                        })
                    }
                });
                t.querySelector('[data-kt-users-modal-action="close"]').addEventListener("click", (t => {
                    t.preventDefault(), KTUsersUpdateDetails.askCancel().then((function(t) {
                        t.value ? (e.reset(), n.hide()) : "cancel" === t.dismiss && KTUsersUpdateDetails.displayFormNotCancelled()
                    }))
                })), t.querySelector('[data-kt-users-modal-action="cancel"]').addEventListener("click", (t => {
                    t.preventDefault(), KTUsersUpdateDetails.askCancel().then((function(t) {
                        t.value ? (e.reset(), n.hide()) : "cancel" === t.dismiss && KTUsersUpdateDetails.displayFormNotCancelled()
                    }))
                }));
                const a = t.querySelector('[data-kt-users-modal-action="submit"]');
                a.addEventListener("click", (function(t) {
                    t.preventDefault(), 
                    a.setAttribute("data-kt-indicator", "on"),
                    a.disabled = !0,
                    o && o.validate().then((function(t) {
                        console.log("validated!"),
                        "Valid" == t && (
                        $.ajax({
                            url: '/employee/save/infos',
                            type: 'post',
                            data: $("#kt_modal_update_user_form").serialize(),
                            dataType: 'JSON',
                            success: function(response){
                                if (response.success == "1") {
                                    a.removeAttribute("data-kt-indicator"),
                                    a.disabled = !1,
                                    KTUsersUpdateDetails.displayReturnSuccess().then((function(t) {
                                        t.isConfirmed && n.hide()
                                        KTUsersUpdateDetails.setDetailsOnPage(response.data);
                                    }
                                    ))
                                }
                                else {
                                    a.removeAttribute("data-kt-indicator"),
                                    a.disabled = !1,
                                    KTUsersUpdateDetails.displayReturnError().then((function(t) {
                                        t.isConfirmed && n.hide()
                                    }
                                    ))
                                }
                            }
                        })
                    )})
                    )
                }))
            })()
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTUsersUpdateDetails.init();
    $("#btn_kt_modal_update_details").on("click", KTUsersUpdateDetails.validate);
}));
