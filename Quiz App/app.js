const questions =[{

    question: "Which of the following is a client site language?",
    a: "Java",
    b: "C",
    c: "Python",
    d: "JavaScript",
    correct: "d",
},

{
     question: 'Which of the following is a markup language?',
     a: 'HTML',
     b: 'CSS',
     c: 'JavaScript',
     d: 'PHP',
     correct: 'a'
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
    question: "What does CSS stands for?",
        a: "Hypertext Markup Language",
        b: "Cascading Style Sheet",
        c: "Jason Object Notation",
        d: "Helicopters Terminals Motorboats Lamborginis",
        correct: "b",
},
]

let index = 0;
let total = questions.length;
let right = 0;
let wrong = 0;
const quesBox = document.getElementById("quesBox");
const optInputs = document.querySelectorAll('.options');
const loadQuestion = ()=>{
    if(index === total){
    return endQuiz();
    }
    reset();
  const data = questions[index];

  quesBox.innerText = `${index+1} ${data.question}`;
  optInputs[0].nextElementSibling.innerText = data.a;
  optInputs[1].nextElementSibling.innerText = data.b;
  optInputs[2].nextElementSibling.innerText = data.c;
  optInputs[3].nextElementSibling.innerText = data.d;
}

const submitQuiz =()=>{

    const data = questions[index];
    const ans = getAnswer();
    if(ans === data.correct){
       right ++;
    }
      else{
        wrong ++;
    }
    index++;
    loadQuestion();
    return;
}

const getAnswer = ()=>{
    let answer;
    optInputs.forEach(
        (input)=>{

            if(input.checked){
               answer =  input.value;
               
            }
        }
    )
    return answer;
}

const reset=()=>{

    optInputs.forEach(
        (input)=>{

            input.checked= false
        }
    )

}

const endQuiz =()=>{

document.getElementById("box").innerHTML =`
<div style= "text-align:center">
<h3> Thankyou for playing the Quiz </h3>
<h2> ${right}/ ${total} are correct </h2>
</div>`
            
}

//initial call    ----> means whenever page will reload it will call the function and perform above task
loadQuestion();

