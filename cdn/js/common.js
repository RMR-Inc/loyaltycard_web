const emailRegex = /^[a-zA-Z_.0-9+\-*=]+@[a-z0-9_]+?\.[a-z0-9]{2,3}$/;
const phoneRegex =
	/\+(9[976]\d|8[987530]\d|6[987]\d|5[90]\d|42\d|3[875]\d|2[98654321]\d|9[8543210]|8[6421]|6[6543210]|5[87654321]|4[987654310]|3[9643210]|2[70]|7|1)\d{3,14}$/;

window.addEventListener("load", () => {
	document.body.classList.add("loaded");

	window.addEventListener("scroll", () => {
		if (window.pageYOffset == 0) {
			document.body.classList.remove("scrolled");
		} else {
			document.body.classList.add("scrolled");
		}
	});

	setInterval(() => {
		let pageImages = document.getElementsByTagName("img");
		for (let i = 0; i < pageImages.length; i++) {
			pageImages[i].setAttribute("draggable", false);
		}

		let inputs = document.getElementsByTagName("input");

		for (let i = 0; i < inputs.length; i++) {
			let input = inputs[i];

			input.addEventListener("input", () => {
				input.classList.remove("valid");
				input.classList.remove("invalid");
			});

			if (input.required) {
				input.addEventListener("focusout", () => {
					if (input.value.trim().length == 0) input.classList.add("invalid");
				});
			}

			if (input.type == "email") {
				input.addEventListener("input", () => {
					if (input.value.trim().length == 0) return;
					if (!input.value.match(emailRegex)) input.classList.add("invalid");
				});
			}

			if (input.type == "tel") {
				input.addEventListener("input", () => {
					if (input.value.trim().length == 0) return;
					if (!input.value.match(phoneRegex)) input.classList.add("invalid");
				});
			}

			if (input.type == "password") {
				let showIcon = input.parentElement.children[1];
				if (!showIcon) return;

				showIcon.addEventListener("mousedown", () => {
					input.type = "text";
					showIcon.src = "https://cdn.loyaltycard.tech/icons/show-password.svg";
				});

				showIcon.addEventListener("mouseup", () => {
					input.type = "password";
					showIcon.src = "https://cdn.loyaltycard.tech/icons/hide-password.svg";
				});
			}
		}

		let textareas = document.getElementsByTagName("textarea");

		for (let i = 0; i < textareas.length; i++) {
			let textarea = textareas[i];

			textarea.addEventListener("input", () => {
				textarea.classList.remove("valid");
				textarea.classList.remove("invalid");
			});

			if (textarea.required) {
				textarea.addEventListener("focusout", () => {
					if (textarea.value.trim().length == 0) textarea.classList.add("invalid");
				});
			}
		}
	}, 500);
});
