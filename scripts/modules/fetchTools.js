export async function fetchGET(url) {
    const request = new Request(url, {
        method: 'GET',
        headers: new Headers()
    });

    const response = await fetch(request);
    return await response.json();
}

export async function fetchPOST(url, data) {
    const request = new Request(url, {
        method: 'POST',
        headers: new Headers(),
        body: JSON.stringify(data)
    });

    const response = await fetch(request);
    return await response.json();
}