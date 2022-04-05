////////////////////
/* GET AND DELETE */
////////////////////

export async function fetchGET(url) {
    return await fetchSingle(url, 'GET');
}

export async function fetchDELETE(url) {
    return await fetchSingle(url, 'DELETE');
}

async function fetchSingle(url, name) {
    const request = new Request(url, {
        method: name,
        headers: new Headers(),
    });

    const response = await fetch(request);
    return await response.json();
}

////////////////////
/* POST AND PUT */
////////////////////

export async function fetchPOST(url, data) {
    return await fetchWithData(url, 'POST', data);
}

export async function fetchPUT(url, data) {
    return await fetchWithData(url, 'PUT', data);
}

export async function fetchWithData(url, name, data) {
    const request = new Request(url, {
        method: name,
        headers: new Headers(),
        body: JSON.stringify(data)
    });

    const response = await fetch(request);
    return await response.json();
}

