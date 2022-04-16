////////////////////
/*  UTILITY FUNC  */
////////////////////

/**
 * Fetch any method, with or without object data
 * @param url
 * @param name
 * @param data
 * @returns {Promise<any>}
 */
export async function useFetch(url, name, data = {}) {
    const request = new Request(url, {
        method: name,
        headers: new Headers(),
        // if body is null
        body: (Object.keys(data).length === 0 && data.constructor === Object) ? null : JSON.stringify(data)
    });

    const response = await fetch(request);
    return await response.json();
}

/**
 * Convert to base 64
 * @param file
 * @returns {Promise<unknown>}
 */
export const toBase64 = file => new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => resolve(reader.result);
    reader.onerror = error => reject(error);
});

