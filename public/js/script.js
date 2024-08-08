document.getElementById('checkbox1').addEventListener('change', function() {
  var textInput = document.getElementById('driver');
  textInput.disabled = this.checked;
});

document.getElementById('checkbox1').dispatchEvent(new Event('change'));