import React from 'react';
import Orders from './Orders';
import { fetchOrders } from '../actions';
import { connect } from 'react-redux';
import Header from './Header';

interface MainProps {
    fetchOrders: () => {},
}

class Main extends React.Component<MainProps> {
    componentDidMount(): void {
        const { fetchOrders } = this.props;
        fetchOrders();
    }

    render() {
        return (
            <div style={{ marginTop: "50px" }}>
                <Header />
                <Orders />
            </div>
        );
    }
};

export default connect(null, { fetchOrders })(Main);
