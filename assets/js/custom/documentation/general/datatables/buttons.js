"use strict";
var KTDatatablesButtons = function() {
	var t, e;
	return {
		init: function() {
			(t = document.querySelector("#kt_datatable_example_1")) && (t.querySelectorAll("tbody tr"), e = $(t).DataTable({
				info: !1,
				order: [],
				pageLength: 10
			}), (() => {
			//	const e = "Aims School  Report new hhh";
				new $.fn.dataTable.Buttons(t, {
					buttons: [{
						extend: "copyHtml5",
			//			title: e
					}, {
						extend: "excelHtml5",
			//			title: e
					}, {
						extend: "csvHtml5",
			//			title: e
					}, {
						extend: "pdfHtml5",
			//			title: e
					},
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i> Print',
                        titleAttr: 'Print'
                    }
                ]
				}).container().appendTo($("#kt_datatable_example_1_export")), document.querySelectorAll("#kt_datatable_example_1_export_menu [data-kt-export]").forEach((t => {
					t.addEventListener("click", (t => {
						t.preventDefault();
						const e = t.target.getAttribute("data-kt-export");
						document.querySelector(".dt-buttons .buttons-" + e).click()
					}))
				}))
			})(), document.querySelector('[data-kt-filter="search"]').addEventListener("keyup", (function(t) {
				e.search(t.target.value).draw()
			})))
		}
	}
}();
KTUtil.onDOMContentLoaded((function() {
	KTDatatablesButtons.init()
}));