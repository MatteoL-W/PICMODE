////////////////////
/* GET AND DELETE */
////////////////////

export async function fetchGET(url) {
    return await useFetch(url, 'GET');
}

export async function fetchDELETE(url) {
    return await useFetch(url, 'DELETE');
}

////////////////////
/*  POST AND PUT  */
////////////////////

export async function fetchPOST(url, data) {
    return await useFetch(url, 'POST', data);
}

export async function fetchPUT(url, data) {
    return await useFetch(url, 'PUT', data);
}

////////////////////
/*  UTILITY FUNC  */
////////////////////

export async function useFetch(url, name, data = {}) {
    const request = new Request(url, {
        method: name,
        headers: new Headers(),
        // if body is null
        body: (Object.keys(data).length === 0 && data.constructor === Object) ?  null : JSON.stringify(data)
    });

    const response = await fetch(request);
    return await response.json();
}