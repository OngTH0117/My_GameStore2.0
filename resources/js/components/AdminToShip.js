import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import {Table, Button, Modal, ModalHeader, ModalBody,ModalFooter,Input, FormGroup, Label} from 'reactstrap';
import axios from 'axios';
import { get } from 'lodash';

export default class AdminToShip extends Component{
    constructor(){
        super()
        this.state ={
            ships:[],
            newShippingModal:false,
            newShippingData: {CustomerId:"", Cname:"",Cphone:"",Caddress:"",productName:"",shipped:""  },
            updateShippingData:{id:"",CustomerId:"", Cname:"",Cphone:"",Caddress:"",productName:"",shipped:"" },
            updateShippingModal:false
        }
    }
    loadShippingList(){
        axios.get('http://127.0.0.1:8000/api/adminShippingList').then((response)=>{
            this.setState({
                ships:response.data
            })     
        }) 
    }


    callUpdateShipping(id,CustomerId, Cname,Caddress,Cphone,productName,shipped )
    {
        this.setState({
            updateShippingData:{id,CustomerId, Cname,Caddress,Cphone,productName,shipped },
            updateShippingModal:!this.state.updateShippingModal
        })
    }
    updateShipping(){
        let{id,CustomerId, Cname,Caddress,Cphone,productName,shipped }=this.state.updateShippingData
        axios.put('http://127.0.0.1:8000/api/adminShipping/' +  this.state.updateShippingData.id,
        {id,CustomerId, Cname,Caddress,Cphone,productName,shipped }).then((response)=>{
          
            this.loadShippingList()
            this.setState({
            
                updateShippingModal:false,
                updateShippingData: {id:"",CustomerId:"", Cname:"",Cphone:"",Caddress:"",productName:"",shipped:""  }
            })     
        }) 
    }
    
    componentWillMount(){
         this.loadShippingList();
    }

    toggleNewShippingModal(){
        this.setState({
            newShippingModal:!this.state.newShippingModal
         })
    }
    toggleUpdateShippingModal(){
        this.setState({
            updateShippingModal:!this.state.updateShippingModal
         })
    }

    render(){
    
        let ships = this.state.ships.map((ship)=>{
            return(
            <tr key={ship.id} >
                <td>{ship.id}</td>
                <td>{ship.CustomerId}</td>
                <td>{ship.Cname}</td>
                <td>{ship.Caddress}</td>
                <td>{ship.Cphone}</td>
                <td>{ship.productName}</td>
                <td>{ship.shipped}</td>
                
                <td>
                        <Button color="primary" outline
                        onClick={this.callUpdateShipping.bind(this,ship.id,ship.CustomerId,ship.Cname,ship.Caddress,ship.Cphone,ship.productName,ship.shipped)}> Edit</Button>
                        
                </td>
            </tr>
        )
        })
    return (
        <div className="container">
            
            <Modal isOpen={this.state.updateShippingModal} toggle={this.toggleUpdateShippingModal.bind(this)}>
                <ModalHeader toggle={this.toggleUpdateShippingModal.bind(this)}> Update </ModalHeader>
                <ModalBody>
                    <FormGroup>
                        <Label for ="orderShipped">Order Shipped</Label>
                        <Input 
                            id = "orderShipped"
                            value ={this.state.updateShippingData.shipped}
                            onChange={(e)=>{
                                let{updateShippingData}=this.state
                                updateShippingData.shipped=e.target.value
                                this.setState({updateShippingData})
                            }}>
                            </Input>
                    </FormGroup>    
                    
    
                </ModalBody>
                <ModalFooter>
                
                    <Button color="primary" onClick={this.updateShipping.bind(this)}>Update </Button>
                    <Button color="secondary" onClick={this.toggleUpdateShippingModal.bind(this)}> Cancel </Button>

                </ModalFooter>
            </Modal>
            
            <Table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Customer Address</th>
                        <th>Customer Contact</th>
                        <th>Product ID</th>
                        <th>Shipped</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {ships}
                </tbody>
            </Table>
        </div>
    );
}
}

    
if (document.getElementById('adminToShip')) {
    ReactDOM.render(<AdminToShip />, document.getElementById('adminToShip'));
}