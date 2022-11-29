const form = document.querySelector("#form");
const submitBtn = document.querySelector("#submitBtn");
console.log("CONNECTED");

submitBtn.addEventListener("click", (e) => {
	e.preventDefault();
	if (!window.location.href.includes("&update=True")) {
		form.action = window.location.href + "&update=True";
	}
	// console.log(form.action);
	form.submit();
})