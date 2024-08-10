const generatePlayer = () => {
  const info = document.getElementById('info');
  info.innerHTML = 'Loading...'
  fetch('./generate_player.php').then(res => res.text()).then(text => {
    info.innerHTML = text;
  });
}
