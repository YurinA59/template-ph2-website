let answerButtons = document.querySelectorAll('.p-quiz-box__answer__button');
// letでanwerbuttonを定義する。queryselectorallでクラス名p-quiz-box__answer__buttonを引っ張ってこれる。
// つまりanswerbuttonはp-quiz-box__answer__buttondのことだよーってなる

for (let i = 0; i < answerButtons.length; i++) {
  answerButtons[i].addEventListener("click", function () {

    let valid = this.dataset.correct;

    const quizBox = this.closest('.js-quiz');
    const answerBox = quizBox.querySelector('.js-answerBox');
    const answerTitle = quizBox.querySelector('.js-answerTitle');
    const answerText = quizBox.querySelector('.js-answerText');

    if (valid === "1") {
      answerTitle.textContent = "正解！";
    } else {
      answerTitle.textContent = "不正解...";
    }

    answerText.textContent = this.textContent.trim();
    answerBox.classList.add("is-show");
  });
}



// addeventlisnerは行動したときにどんなことが起きるか。
// 今回はクリックしたときにfunctionという関数が起きる
