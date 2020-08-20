import axios from 'axios';

const getRequest = async (className: string, id?: string, params?: string) => {
    let result;
    if (id) {
        result = await axios.get(`/api/${className}/${id}`);
    } else {
        if (params === undefined) {
            result = await axios.get(`/api/${className}`);
        } else {
            result = await axios.get(`/api/${className}?${params}`);
        }
    }
    return result.data;
}

export {
    getRequest
};
