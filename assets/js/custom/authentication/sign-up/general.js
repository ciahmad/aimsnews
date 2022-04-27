"use strict";
var KTSignupGeneral = function() {
    var e, t, a, s, r = function() {
        return 100 === s.getScore()
    };
    return {
        init: function() {
            e = document.querySelector("#kt_sign_up_form"), t = document.querySelector("#kt_sign_up_submit"), s = KTPasswordMeter.getInstance(e.querySelector('[data-kt-password-meter="true"]')), a = FormValidation.formValidation(e, {
                fields: {
                    "first_name": {
                        validators: {
                            notEmpty: {
                                message: "First Name is required"
                            }
                        }
                    },
                    "last_name": {
                        validators: {
                            notEmpty: {
                                message: "Last Name is required"
                            }
                        }
                    },
                    "school_name": {
                        validators: {
                            notEmpty: {
                                message: "Institute Name is required"
                            }
                        }
                    },
                    "contactno": {
                        validators: {
                            notEmpty: {
                                message: "Contact Number is required"
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: "Email address is required"
                            },
                            emailAddress: {
                                message: "The value is not a valid email address"
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "The password is required"
                            },
                            callback: {
                                message: "Please enter valid password",
                                callback: function(e) {
                                    if (e.value.length > 0) return r()
                                }
                            }
                        }
                    },
                    "confirm_password": {
                        validators: {
                            notEmpty: {
                                message: "The password confirmation is required"
                            },
                            identical: {
                                compare: function() {
                                    return e.querySelector('[name="password"]').value
                                },
                                message: "The password and its confirm are not the same"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger({
                        event: {
                            password: !1
                        }
                    }),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            }), t.addEventListener("click", (function(r) {
                r.preventDefault(), a.revalidateField("password"), a.validate().then((function(a) {
                    "Valid" == a ? (t.setAttribute("data-kt-indicator", "on"), t.disabled = !0, setTimeout((function() {
                        t.removeAttribute("data-kt-indicator"), t.disabled = !1, Swal.fire({
                            text: "You have successfully reset your password!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then((function(t) {
                        		if(t.isConfirmed){
                        			var path = e.getAttribute("data-kt-redirect-path");
		                        	var data = $("#kt_sign_up_form").serialize();
		                        	//console.log(t.isConfirmed, path, data); return false;
		                        	$.ajax({
		                                  method: "POST",
		                                  url: path,
		                                  dataType: "json",
		                                  data: data,
		                                  success: function(data){
		                                        
		                                        if (data.status == "fail") {
		                                        	var message = "";
							                        $.each(data.error, function (index, value) {
							                            message += value;
							                        });
		                                            Swal.fire("Oooops", message, "warning");
		                                        }
                                                if (data.status == "success") {
		                                            location.href = data.redirect;
		                                        }
		                                  }
		                            });
		                        }

                            //t.isConfirmed && (e.reset(), s.reset())
                        }))
                    }), 1500)) : Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    })
                }))
            })), e.querySelector('input[name="password"]').addEventListener("input", (function() {
                this.value.length > 0 && a.updateFieldStatus("password", "NotValidated")
            }))
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTSignupGeneral.init()
}));