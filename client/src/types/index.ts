export interface ProductType {
    uuid: string;
    rental_fee: number;
    install_fee: number;
    contract_term: number;
};

export interface AccountType {
    uuid: string;
    first_name: string;
    last_name: string;
    email: string;
    orders?: OrderType[];
};

export enum OrderStatus {
    InProgress = 'In Progress',
    UnderReview = 'Under Review',
    Completed = 'Completed',
}

export interface OrderType {
    uuid: string;
    owner: AccountType;
    products?: ProductType[];
    total_contract: number;
    status: OrderStatus;
};

export interface ReduxStore {
    orders: OrderType[];
};
