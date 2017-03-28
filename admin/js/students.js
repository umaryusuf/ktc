function setUpdateAction() {
	document.frmstudents.action = "edit_students.php";
	document.frmstudents.submit();
}
function setDeleteAction() {
	if(confirm("Are you sure want to delete these rows?")) {
		document.frmstudents.action = "delete.php";
		document.frmstudents.submit();
	}
}