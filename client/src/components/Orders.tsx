import React from 'react';
import Table from 'react-bootstrap/Table'
import { connect } from 'react-redux';
import { OrderType, ReduxStore } from '../types';
import { deleteOrder } from '../actions';
import Button from 'react-bootstrap/cjs/Button';
import { AiTwotoneDelete } from 'react-icons/ai';

interface OrdersProps {
    deleteOrder: (id: string) => void,
    orders: OrderType[],
}

const Orders = (props: OrdersProps) => {
    const { orders, deleteOrder } = props;

    const handleClick = (id: string) => {
        deleteOrder(id);
    };

    const renderRow = (orders: OrderType[]) => {
        return orders.map((order: OrderType, key: number) => {
            return (
                <tr key={key}>
                    <td>{key}</td>
                    <td>{`${order.owner.first_name} ${order.owner.last_name}`}</td>
                    <td>{order.status}</td>
                    <td>{order.total_contract}</td>
                    <td>
                        <Button variant="secondary" size="sm" active onClick={() => handleClick(order.uuid)}>
                            <AiTwotoneDelete />
                        </Button>
                    </td>
                </tr>
            );
        })
    };

    if (orders === undefined) {
        return null;
    }
    return (
        <Table striped bordered hover size="sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Status</th>
                <th>Total ($)</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                {renderRow(orders)}
            </tbody>
        </Table>
    )
};

const mapStateToProps = (state: ReduxStore) => {
    const { orders } = state;
    return {
        orders,
    }
};

export default connect(mapStateToProps, { deleteOrder })(Orders);
