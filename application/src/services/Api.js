import Axios from 'axios';
import Promise from 'promise.prototype.finally';
import Config from 'config';
import HttpError from 'services/Http';

Promise.shim();

let request = (method, url, data) => {
    let request = {
        baseURL: Config.host.api,
        url: url,
        method: method,
        headers: {
            'X-Auth-Token': localStorage.getItem(`${Config.localStoragePrefix}.X-Auth-Token`),
            'Content-type': 'application/json; charset=UTF-8'
        }
    };
    if (method === 'post' || method === 'put' || method === 'path') {
        request.data = data;
    } else {
        request.params = data;
    }

    return Axios(request).then(response => {
        if (!response.data) {
            return response.data;
        } else {
            throw new HttpError('No payload', 500);
        }
    });
};

export default {
    post (url, data) {
        return request('post', url, data);
    },
    put (url, data) {
        return request('put', url, data);
    },
    patch (url, data) {
        return request('patch', url, data);
    },
    delete (url, data) {
        return request('delete', url, data);
    },
    get (url, data) {
        return request('get', url, data);
    }
};
