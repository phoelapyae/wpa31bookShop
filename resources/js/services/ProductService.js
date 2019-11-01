import axios from 'axios';

const apiClient = axios.create({
    baseURL: 'http://localhost:8000/book/data',
    withCredentials: false,
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json'
    }
})

export default {
    getProducts() {
        return apiClient.get('/products')
    },
    getProduct(id) {
        return apiClient.get('/products/' + id)
    }
}