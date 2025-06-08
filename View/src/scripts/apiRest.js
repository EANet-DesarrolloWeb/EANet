const apiKey = "AIzaSyDR6GfAJvoF9eUBdZoGukIpCecEVpqdE4k"

async function getMail(query) {
    const apiURL = `https://gmail.googleapis.com`;

    try {
        const response = await fetch(apiURL);
        if (!response.ok) {
            alert(`Error en la solicitud: ${response.status}`);
            throw new Error(`Error en la solicitud: ${response.status}`);
        }
        const data = await response.json();
        alert(`Api solicitada correctamente`);
        return data;        
    } catch (error) {
        alert(`Error en la solicitud`);
        console.error("Error:", error);
        return null;
    }
}

async function getLibros(query) {
  const apiURL = `https://www.googleapis.com/books/v1/volumes?q=${encodeURIComponent(query)}`;
  try {
    const response = await fetch(apiURL);
    const data = await response.json();
    console.log(data);
    alert("¡API de libros funcionó!");
  } catch (error) {
    console.error("Error en getLibros:", error);
    alert("Error al solicitar API de libros");
  }
}

async function getYoutube(query) {
    const apiURL = `https://www.googleapis.com/youtube/v3/videos?id=G9laMqCP_ho&key=${apiKey}` 

    try {
        const response = await fetch(apiURL);
        if (!response.ok) {
            alert(`Error en la solicitud: ${response.status}`);
            throw new Error(`Error en la solicitud: ${response.status}`);
        }
        const data = await response.json();
         alert(`Api solicitada correctamente`);
        return data;        
    } catch (error) {
        alert(`Error en la solicitud`);
        console.error("Error:", error);
        return null;
    }
}

async function getCalendar(query) {
    const calendarId = "en.usa#holiday@group.v.calendar.google.com"; // calendario público
const apiURL = `https://www.googleapis.com/calendar/v3/calendars/${encodeURIComponent(calendarId)}/events?key=${apiKey}`;
    try {
        const response = await fetch(apiURL);
        if (!response.ok) {
            alert(`Error en la solicitud: ${response.status}`);
            throw new Error(`Error en la solicitud: ${response.status}`);
        }
        const data = await response.json();
         alert(`Api solicitada correctamente`);
        return data;        
    } catch (error) {
        alert(`Error en la solicitud`);
        console.error("Error:", error);
        return null;
    }
}
