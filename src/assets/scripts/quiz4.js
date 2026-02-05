let answerButtons = document.querySelectorAll(".p-quiz-box__answer__button");
console.log("quiz4.js loaded!");
console.log("ボタン数:", answerButtons.length);
// letでanwerbuttonを定義する。queryselectorallでクラス名p-quiz-box__answer__buttonを引っ張ってこれる。
// つまりanswerbuttonはp-quiz-box__answer__buttondのことだよーってなる

for (let i = 0; i < answerButtons.length; i++) {
    answerButtons[i].addEventListener("click", function () {
        console.log(this.dataset.correct);
        let valid = this.dataset.correct;

        const quizBox = this.closest(".js-quiz");
        const answerBox = quizBox.querySelector(".js-answerBox");
        const answerTitle = quizBox.querySelector(".js-answerTitle");
        const answerText = quizBox.querySelector(".js-answerText");

        if (valid === "1") {
            answerTitle.textContent = "正解！";
            answerText.textContent = this.textContent.trim();
            answerBox.classList.add("is-correct");
        } else {
            answerTitle.textContent = "不正解...";
            // 正解の選択肢を探して表示
            const correctButton = quizBox.querySelector('.p-quiz-box__answer__button[data-correct="1"]');
            answerText.textContent = correctButton.textContent.trim();
            answerBox.classList.add("is-incorrect");
        }
    });
}

// addeventlisnerは行動したときにどんなことが起きるか。
// 今回はクリックしたときにfunctionという関数が起きる
