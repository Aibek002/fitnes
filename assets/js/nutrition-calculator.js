let selectedOption1 = null;
let selectedOption2 = null;
let selectedOption3 = null;
let selectedOption4 = null;

function selectGoal(option) {
  if (selectedOption1) {
    selectedOption1.classList.remove('selected');
  }
  selectedOption1 = option;
  selectedOption1.classList.add('selected');
}

function selectGender(option) {
  if (selectedOption2) {
    selectedOption2.classList.remove('selected');
  }
  selectedOption2 = option;
  selectedOption2.classList.add('selected');
}

function selectBodyFat(option) {
  if (selectedOption3) {
    selectedOption3.classList.remove('selected');
  }
  selectedOption3 = option;
  selectedOption3.classList.add('selected');
}


function selectWeightGoal(option) {
  if (selectedOption4) {
    selectedOption4.classList.remove('selected');
    document.getElementById('goal-selected').style.display = 'none'; 
  }
  selectedOption4 = option;
  selectedOption4.classList.add('selected');
document.getElementById('goal-selected').style.display = 'block'; 

}

