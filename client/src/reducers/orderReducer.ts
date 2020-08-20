import { FETCH_ORDERS, LOADING_ORDERS } from '../actions/types';

export default function(state = [], action: any) {
    switch (action.type) {
        case FETCH_ORDERS:
            return action.payload || false
        case LOADING_ORDERS:
            return []
        default:
            return state;
    }
}
