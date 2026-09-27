// import "./styles.css";
import "./index.scss";

document
  .getElementById("callback-form")
  .addEventListener("submit", function (e) {
    e.preventDefault(); // Блокируем стандартную перезагрузку

    let form = this;
    let formData = new FormData(form);
    let resultBlock = document.getElementById("form-result");

    resultBlock.innerText = "Отправка...";

    fetch("send.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        if (data === "success") {
          resultBlock.style.color = "green";
          resultBlock.innerText =
            "Заявка успешно отправлена! Скоро мы свяжемся с вами.";
          form.reset(); // Очищаем форму
        } else {
          resultBlock.style.color = "red";
          resultBlock.innerText = "Ошибка при отправке. Попробуйте позже.";
        }
      })
      .catch((error) => {
        resultBlock.style.color = "red";
        resultBlock.innerText = "Ошибка сети.";
      });
  });
