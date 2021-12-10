"use strict";
var KTUsersUpdatePassword = function() {
    const t = document.getElementById("kt_modal_update_password")
      , e = t.querySelector("#kt_modal_update_password_form")
      , n = new bootstrap.Modal(t);
    return {
        init: function() {
            (()=>{
                var o = FormValidation.formValidation(e, {
                    fields: {
                        new_password: {
                            validators: {
                                notEmpty: {
                                    message: "Obligatoire"
                                },
                                callback: {
                                    message: "Merci de respecter les règles de mot de passe",
                                    callback: function(t) {
                                        if (t.value.length > 0)
                                        console.info(t);
                                            return validatePassword(t)
                                    }
                                }
                            }
                        },
                        confirm_password: {
                            validators: {
                                notEmpty: {
                                    message: "Obligatoire"
                                },
                                identical: {
                                    compare: function() {
                                        return e.querySelector('[name="new_password"]').value
                                    },
                                    message: "Le mot de passe doit être identique"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                });
                t.querySelector('[data-kt-users-modal-action="close"]').addEventListener("click", (t=>{
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
                        t.value ? (e.reset(),
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
                        t.value ? (e.reset(),
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
                    o && o.validate().then((function(t) {
                        console.log("validated!"),
                        "Valid" == t && (a.setAttribute("data-kt-indicator", "on"),
                        a.disabled = !0,
                        setTimeout((function() {
                            a.removeAttribute("data-kt-indicator"),
                            a.disabled = !1,
                            Swal.fire({
                                text: "Form has been successfully submitted!",
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then((function(t) {
                                t.isConfirmed && n.hide()
                            }
                            ))
                        }
                        ), 2e3))
                    }
                    ))
                }
                ))
            }
            )()
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTUsersUpdatePassword.init()
}
));

const validatePassword = function (input) {
    const value = input.value;

    if (value === '') {
        return { valid: true };
    }

    if (value.length < 12) {
        return {
            valid: false,
            message: 'Password must have at least 12 characters',
        };
    }

    if (value === value.toLowerCase()) {
        return {
            valid: false,
            message: 'Password must have at least one uppercase character',
        };
    }

    if (value === value.toUpperCase()) {
        return {
            valid: false,
            message: 'Password must have at least one lowercase character',
        };
    }

    if (value.search(/[0-9]/) < 0) {
        return {
            valid: false,
            message: 'Password must have at least one digit',
        };
    }
    
    if (value.search(/[!@#$%^&*]/) < 0) {
        return {
            valid: false,
            message: 'Password must have at least one symbol',
        };
    }

    return { valid: true };
};