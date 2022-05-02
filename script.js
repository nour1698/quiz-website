const quizData = [
    {
        question: "Which language runs in a web browser?",
        a: "Java",
        b: "C",
        c: "Python",
        d: "javascript",
        correct: "d",
    },
    {
        question: "What does CSS stand for?",
        a: "Central Style Sheets",
        b: "Cascading Style Sheets",
        c: "Cascading Simple Sheets",
        d: "Cars SUVs Sailboats",
        correct: "b",
    },
    {
        question: "What does HTML stand for?",
        a: "Hypertext Markup Language",
        b: "Hypertext Markdown Language",
        c: "Hyperloop Machine Language",
        d: "Helicopters Terminals Motorboats Lamborginis",
        correct: "a",
    },
    {
        question: "What year was JavaScript launched?",
        a: "1996",
        b: "1995",
        c: "1994",
        d: "none of the above",
        correct: "b",
    },
    {
        question: "اين تقع مدينة الرباط ؟",
        a: "مصر",
        b: "المغرب",
        c: "تونس",
        d: "الجزائر",
        correct: "b",
    },
    {
        question: "اين تقع مدينة القدس؟",
        a: "مصر",
        b: "فلسطين",
        c: "تونس",
        d: "الجزائر",
        correct: "b",
    },
    


];

const quiz= document.getElementById('quiz')  //head od q and q with options
const answerEls = document.querySelectorAll('.answer')  //correct answer
const questionEl = document.getElementById('question')  //head of qustion
const a_text = document.getElementById('a_text') //option1
const b_text = document.getElementById('b_text')  //option2
const c_text = document.getElementById('c_text')
const d_text = document.getElementById('d_text')
const submitBtn = document.getElementById('submit')

//console.log(answerEls);

let currentQuiz = 0
let score = 0
 
loadQuiz()  // to hold one qustion

function loadQuiz() {

    deselectAnswers()

    const currentQuizData = quizData[currentQuiz] //first index of array of ques in currnt ehich shown

    questionEl.innerText = currentQuizData.question
    a_text.innerText = currentQuizData.a
    b_text.innerText = currentQuizData.b
    c_text.innerText = currentQuizData.c
    d_text.innerText = currentQuizData.d
}

function deselectAnswers() {
    answerEls.forEach(answerEl => answerEl.checked = false)
}

function getSelected() {
    let answer
    answerEls.forEach(answerEl => {
        if(answerEl.checked) {
            answer = answerEl.id
        }
    })
    return answer
}


submitBtn.addEventListener('click', () => {
    const answer = getSelected()
    if(answer) {
       if(answer === quizData[currentQuiz].correct) {
           score++
       }

       currentQuiz++

       if(currentQuiz < quizData.length) {
           loadQuiz()
       } else {
           quiz.innerHTML = `
           <h2>You answered ${score}/${quizData.length} questions correctly</h2>

           <button onclick="location.reload()">Reload</button>
      
           <button  class="registerbtn"> <a href="ModelAnswer.pdf" target="_blank" class="bton">model answer</a></button>
           `
       }
    }
})
