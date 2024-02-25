document.getElementById('checkButton').addEventListener('change', function() {
    var checkbox = document.getElementById('checkButton');
    if (checkbox.checked) {
      checkbox.classList.add('checked');
    } else {
      checkbox.classList.remove('checked');
    }
  });