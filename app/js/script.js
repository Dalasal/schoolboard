let xhr = new XMLHttpRequest();
xhr.open('GET', '/app/database/users-log.php');
xhr.send();

xhr.onload = function() {
  if (xhr.status != 200) {
    alert(`Ошибка ${xhr.status}: ${xhr.statusText}`);
  } else {
    alert(`Готово, получили ${xhr.response.length} байт`);
  }
};
