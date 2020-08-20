import axios from 'axios';
import { FETCH_ORDERS } from './types';
import { BASE_URL } from '../constants';

const fetchOrders = () => async (dispatch: any) => {
    const response = await axios.get(`${BASE_URL}api/orders`);
    dispatch({ type: FETCH_ORDERS, payload: response.data.data })
};

const deleteOrder = (id: string) => async (dispatch: any) => {
    const response = await axios.delete(`${BASE_URL}api/orders/${id}`);
    dispatch({ type: FETCH_ORDERS, payload: response.data.data })
};

export {
    fetchOrders,
    deleteOrder
}
