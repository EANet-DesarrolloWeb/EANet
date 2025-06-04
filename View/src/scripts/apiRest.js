const apiKey = "AIzaSyDR6GfAJvoF9eUBdZoGukIpCecEVpqdE4k"

async function getMail(query) {
    const apiURL = `https://`

    try {
        const response = await fetch(apiURL);
        if (!response.ok) {
            throw new Error(`Error en la solicitud: ${response.status}`);
        }
        const data = await response.json();
        return data;        
    } catch (error) {
        console.error("Error:", error);
        return null;
    }
}

async function getLibros(query) {
    const apiURL = `https://books.google.com/ebooks?id=buc0AAAAMAAJ&dq=holmes&as_brr=4&source=webstore_bookcard`

    try {
        const response = await fetch(apiURL);
        if (!response.ok) {
            throw new Error(`Error en la solicitud: ${response.status}`);
        }
        const data = await response.json();
        return data;        
    } catch (error) {
        console.error("Error:", error);
        return null;
    }
}

async function getYoutube(query) {
    const apiURL = `https://www.googleapis.com/youtube/v3/videos?id=G9laMqCP_ho&key=${apiKey}` 

    try {
        const response = await fetch(apiURL);
        if (!response.ok) {
            throw new Error(`Error en la solicitud: ${response.status}`);
        }
        const data = await response.json();
        return data;        
    } catch (error) {
        console.error("Error:", error);
        return null;
    }
}

