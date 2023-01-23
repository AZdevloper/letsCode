
btnSubmit.disabled = true;
//array 
let array = [];
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
userName.addEventListener("input", function (e) {
  var pattern = /^[^0-9]{3,15}$/;
  var currentValue = e.target.value;
  let valid = pattern.test(currentValue);
  console.log("message", valid);

  if (valid) {
  labelError.remove();
  infoIcon.remove();
  e.target.classList.remove("border-danger", "bg-danger-subtle");
  e.target.classList.add("border-success", "bg-success-subtle");
  array.push(true);
  } else {
      e.target.classList.add(
        "border-danger",
        "border-start-0",
        "border-end-0",
        "border-bottom-0",
        "bg-danger-subtle"
      );
      labelError.textContent = "unacceptable information for user name";
      divUserName.appendChild(labelError);
      divUserName.appendChild(infoIcon);

  }
});

// email validation
userEmail.addEventListener("input", function (e) {
  var pattern = /^[a-z.A-Z]+@[a-zA-Z]+.com$/;
  var currentValue = e.target.value;
  let valid = pattern.test(currentValue);
  console.log("message", valid);

  if (valid) {
    labelError.remove();
    infoIcon.remove();
    e.target.classList.remove("border-danger", "bg-danger-subtle");
    e.target.classList.add("border-success", "bg-success-subtle");
  array.push(true);
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

  }
});

passWord.addEventListener("input", function (e) {
  var pattern1 = /[a-z]/;
  var pattern2 = /[A-Z]/;
  var pattern3 = /[0-9]/;
  var currentValue = e.target.value;
  let valid1 = pattern1.test(currentValue);
  let valid2 = pattern2.test(currentValue);
  let valid3 = pattern3.test(currentValue);

  if (valid1 && valid2 && valid3 && currentValue.length >= 8) {
 labelError.remove();
 infoIcon.remove();
 e.target.classList.remove("border-danger", "bg-danger-subtle");
 e.target.classList.add("border-success", "bg-success-subtle");
  array.push(true);
  } else {
     e.target.classList.add(
       "border-danger",
       "border-start-0",
       "border-end-0",
       "border-bottom-0",
       "bg-danger-subtle"
     );
     labelError.textContent =
       "password must contain: uppercase, lowercase, numbers, more than 8 characters";
     divPassword.appendChild(labelError);
     divPassword.appendChild(infoIcon);
  }
});

ConfirmPassword.addEventListener("input", function (e) {
  if (ConfirmPassword.value == passWord.value) {
    labelError.remove();
    infoIcon.remove();
    e.target.classList.remove("border-danger", "bg-danger-subtle");
    e.target.classList.add("border-success", "bg-success-subtle");
  array.push(true);
  } else {
    e.target.classList.add(
      "border-danger",
      "border-start-0",
      "border-end-0",
      "border-bottom-0",
      "bg-danger-subtle"
    );
    labelError.textContent = "password not match  ";
    divConfirmPassword.appendChild(labelError);
    divConfirmPassword.appendChild(infoIcon);
  }
  cheekAll();
});
function cheekAll(){
  let check = 0 ;
  for (const iterator of array) {
    iterator && ++check;
    
    
  }
  console.log(check)
  if (check >= 4) {
    // console.log(check);
    let Submit = document.getElementById("btnSubmit");
    Submit.disabled = false;
    // btnSubmit.setAttribute("type", "");
    // divBtnSubmit.textContent = "fill all ";
    // divBtnSubmit.appendChild(labelError);
  }
};