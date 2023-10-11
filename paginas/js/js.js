


// Obtén todas las etiquetas <td> en la tabla
const tdElements = document.querySelectorAll('td');

// Recorre cada etiqueta <td> y cambia su clase según su contenido
tdElements.forEach(td => {
  const contenido = td.textContent.trim(); // Obtén el contenido y elimina espacios en blanco

  // Verifica el contenido y cambia la clase en consecuencia
  if (contenido === 'calificar') {
    td.classList.add('calificar');
  } else if (contenido === 'calificando') {
    td.classList.add('calificando');
  } else if (contenido === 'calificado') {
    td.classList.add('calificado');
  }
});

