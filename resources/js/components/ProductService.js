import axios from 'axios';

const apiClient = axios.create({
    baseURL: 'http://localhost:8000',
    withCredentials: false,
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json'
    }
})

export default {
    getProducts() {
        return apiClient.get('/book/data')
    },
    getProduct(id) {
        const url = '/book/data';
        const lastUrl = url.data;
        return apiClient.get(lastUrl + id)
    }
}