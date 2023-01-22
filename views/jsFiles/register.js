// alert('register');
userNameSignUp.addEventListener("input", function (e) {
  var pattern = /^[^0-9]{3,15}$/;
  var currentValue = e.target.value;
  let valid = pattern.test(currentValue);
  console.log("message", valid);

  if (valid) {
    e.target.classList.remove("border-danger", "bg-danger-subtle");
    e.target.classList.add("border-success", "bg-success-subtle");
  } else {
    e.target.classList.add(
      "border-danger",
      "border-2",
      "bg-danger-subtle",
    );
  }
});
// label and icon of error
let labelError = document.createElement("label");
labelError.classList.add(
  "row",
  "text-danger"
);
let infoIcon = document.createElement("i");
infoIcon.classList.add(
  "fa",
  "fa-info",
  "rounded",
  "rounded-circle",
  "bg-danger",
  "p-1",
  "text-white",
  "position-absolute"
);

let o = `<label  class="  row  m-1 text-danger  fs-13px "
											id="labelErro">unacceptable information </label>`;
let i  = `<i id="infoIcon" class="fa fa-info rounded rounded-circle bg-danger p-1 text-white position-absolute "></i>`;
// email validation
userEmail.addEventListener("input", function (e) {
  var pattern = /^[a-z.A-Z]+@[a-zA-Z]+.com$/;
  var currentValue = e.target.value;
  let valid = pattern.test(currentValue);
  console.log("message", valid);

  if (valid) {
    console.log(valid);
    labelErrorElement.remove()
    // label_error_email.classList.add("d-none");
    e.target.classList.remove("border-danger", "bg-danger-subtle");
    e.target.classList.add("border-success", "bg-success-subtle");
  } else {
    e.target.classList.add(
      "border-danger",
      "border-start-0",
      "border-end-0",
      "border-bottom-0",
      "bg-danger-subtle"
    );
    labelError.textContent = "unacceptable information for email";
    divEmail.appendChild(labelError);
    divEmail.appendChild(infoIcon);
    // divEmail.innerHTML += infoIcon;
    // let labelErrorElement =  document.getElementById("labelError");
    // labelErrorElement.textContent = "unacceptable information for email";
   
    // console.log(labelErrorElement);
    // label_error_email.classList.remove("d-none");

    // label_error_email.classList.add("d-block");
  }
});