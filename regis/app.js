const sign_up_btn = document.querySelector('#sign-up-btn');
const sign_in_btn = document.querySelector('#sign-in-btn');
const container = document.querySelector('.container');

container.classList.add("sign-up-mode");
sign_up_btn.addEventListener('click', () => {
  container.classList.add('sign-up-mode');
});

sign_in_btn.addEventListener('click', () => {
  container.classList.remove('sign-up-mode');
});

const FileBtn = document.getElementById("file");
const customBtn = document.getElementById("custom-button");
const customTxt = document.getElementById("custom-text");

customBtn.addEventListener("click", function() {
  FileBtn.click();
});

FileBtn.addEventListener("change", function() {
  if (FileBtn.value) {
    customTxt.innerHTML = FileBtn.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt.innerHTML = "Tidak ada file terpilih";
  }
});
