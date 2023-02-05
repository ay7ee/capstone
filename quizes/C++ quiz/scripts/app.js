const headElem = document.getElementById("head");
const buttonsElem = document.getElementById("buttons");
const pagesElem = document.getElementById("pages");

//Класс, который представляет сам тест
class Quiz
{
	constructor(type, questions, results)
	{
		this.type = type;

		this.questions = questions;

		this.results = results;

		this.score = 0;

		this.result = 0;

		this.current = 0;
	}

	Click(index)
	{
		let value = this.questions[this.current].Click(index);
		this.score += value;

		let correct = -1;

		if(value >= 1)
		{
			correct = index;
		}
		else
		{
			for(let i = 0; i < this.questions[this.current].answers.length; i++)
			{
				if(this.questions[this.current].answers[i].value >= 1)
				{
					correct = i;
					break;
				}
			}
		}

		this.Next();

		return correct;
	}

	Next()
	{
		this.current++;
		
		if(this.current >= this.questions.length) 
		{
			this.End();
		}
	}

	End()
	{
		for(let i = 0; i < this.results.length; i++)
		{
			if(this.results[i].Check(this.score))
			{
				this.result = i;
			}
		}
	}
} 

class Question 
{
	constructor(text, answers)
	{
		this.text = text; 
		this.answers = answers; 
	}

	Click(index) 
	{
		return this.answers[index].value; 
	}
}

class Answer 
{
	constructor(text, value) 
	{
		this.text = text; 
		this.value = value; 
	}
}

class Result 
{
	constructor(text, value)
	{
		this.text = text;
		this.value = value;
	}

	Check(value)
	{
		if(this.value <= value)
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
}

const results = 
[
	new Result("You have a lot to learn", 0),
	new Result("You already know a lot", 2),
	new Result("Your level is above average", 4),
	new Result("You know the topic perfectly", 6)
];

const questions = 
[
	new Question("How do I add a comment?", 
	[
		new Answer("/ * comment here / *", 0),
		new Answer("# comment here", 0),
		new Answer("// comment here", 1),
		new Answer("/ comment here", 0)
	]),

	new Question("How to connect the iostream standard library?", 
	[
		new Answer("#include iostream", 0),
		new Answer("#include <iostream.h>", 0),
		new Answer("#include 'iostream'", 1),
		new Answer("#include 'iostream.h'", 0)
	]),

	new Question("Where is the variable specified correctly?", 
	[
		new Answer("done = true;", 0),
		new Answer("char sym = 'a';", 1),
		new Answer("float x = 32,14;", 0),
		new Answer("var str = 'Hi';", 0)
	]),

	new Question("How many parameters can you pass to the destructor?", 
	[
		new Answer("Can't pass parameters to destructor", 1),
		new Answer("Maximum 1", 0),
		new Answer("No more than 3", 0),
		new Answer("No more than 10", 0)
	]),

	new Question("How many arguments can you pass to a function?", 
	[
		new Answer("Less than 5", 0),
		new Answer("More than 10", 1),
		new Answer("Less than 10", 0),
		new Answer("only 1", 0)
	]),

	new Question("int x[] = {1, 2, 3, 4} <br> cout << x[2]", 
	[
		new Answer("1", 0),
		new Answer("2", 0),
		new Answer("3", 1),
		new Answer("4", 0)
	])
];

const quiz = new Quiz(1, questions, results);

Update();

function Update()
{
	if(quiz.current < quiz.questions.length) 
	{
		headElem.innerHTML = quiz.questions[quiz.current].text;

		buttonsElem.innerHTML = "";

		for(let i = 0; i < quiz.questions[quiz.current].answers.length; i++)
		{
			let btn = document.createElement("button");
			btn.className = "button";

			btn.innerHTML = quiz.questions[quiz.current].answers[i].text;

			btn.setAttribute("index", i);

			buttonsElem.appendChild(btn);
		}
		
		pagesElem.innerHTML = (quiz.current + 1) + " / " + quiz.questions.length;

		Init();
	}
	else
	{
		buttonsElem.innerHTML = "";
		headElem.innerHTML = quiz.results[quiz.result].text;
		pagesElem.innerHTML = "Score: " + quiz.score;
	}
}

function Init()
{
	let btns = document.getElementsByClassName("button");

	for(let i = 0; i < btns.length; i++)
	{
		btns[i].addEventListener("click", function (e) { Click(e.target.getAttribute("index")); });
	}
}

function Click(index) 
{
	let correct = quiz.Click(index);

	let btns = document.getElementsByClassName("button");

	for(let i = 0; i < btns.length; i++)
	{
		btns[i].className = "button button_passive";
	}

	if(quiz.type == 1)
	{
		if(correct >= 0)
		{
			btns[correct].className = "button button_correct";
		}

		if(index != correct) 
		{
			btns[index].className = "button button_wrong";
		} 
	}
	else
	{
		btns[index].className = "button button_correct";
	}

	setTimeout(Update, 1000);
}