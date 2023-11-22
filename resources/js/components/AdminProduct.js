import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import {Table, Button, Modal, ModalHeader, ModalBody,ModalFooter,Input, FormGroup, Label} from 'reactstrap';
import axios from 'axios';
import { get } from 'lodash';

export default class AdminProduct extends Component{
    constructor(){
        super()
        this.state ={
            products:[],
            newProductModal:false,
            newProductData: {productName:"",console:"",price:"",image:"" },
            updateProductData:{id:"",productName:"", console:"",price:"",image:"" },
            updateProductModal:false
        }
    }
    loadProduct(){
        axios.get('http://127.0.0.1:8000/api/adminProducts').then((response)=>{
            this.setState({
                products:response.data
            })     
        }) 
    }

    addProduct(){
        axios.post('http://127.0.0.1:8000/api/adminProduct', this.state.newProductData).then((response)=>{
            let{products}=this.state
            this.loadProduct()
            this.setState({
                products,
                newProductModal:false,
                newProductData: {productName:"",console:"",price:"",image:"" }
            })     
        }) 
    }

    callUpdateProduct(id,productName, console,price,image )
    {
        this.setState({
            updateProductData:{id,productName, console,price,image },
            updateProductModal:!this.state.updateProductModal
        })
    }
    updateProduct(){
        let{id,productName, console,price,image }=this.state.updateProductData
        axios.put('http://127.0.0.1:8000/api/adminProduct/' +  this.state.updateProductData.id,
        {id,productName, console,price,image }).then((response)=>{
          
            this.loadProduct()
            this.setState({
            
                updateProductModal:false,
                updateProductData: {id:"",productName:"",console:"",price:"",image:"" }
            })     
        }) 
    }
    deleteProduct(id){
        axios.delete('http://127.0.0.1:8000/api/adminProduct/' + id).then((response)=>{
            this.loadProduct()    
        }) 
    }
    componentWillMount(){
         this.loadProduct();
    }

    toggleNewProductModal(){
        this.setState({
            newProductModal:!this.state.newProductModal
         })
    }
    toggleUpdateProductModal(){
        this.setState({
            updateProductModal:!this.state.updateProductModal
         })
    }

    render(){
    
        let products = this.state.products.map((product)=>{
            return(
            <tr key={product.id}>
                <td>{product.id}</td>
                <td>{product.productName}</td>
                <td>{product.console}</td>
                <td>{product.price}</td>
                <td><img src={product.image} width="140px" height="170px"></img></td>
                <td>
                        <Button color="primary" outline
                        onClick={this.callUpdateProduct.bind(this,product.id,product.productName,product.console,product.price,product.image)}> Edit</Button>
                        <Button color="danger" outline
                        onClick={this.deleteProduct.bind(this,product.id)}> Delete</Button>
                        
                </td>
            </tr>
        )
        })
    return (
        <div className="container">
            <Button color="primary" onClick={this.toggleNewProductModal.bind(this)}>Add Product</Button>
            <Modal isOpen={this.state.newProductModal} toggle={this.toggleNewProductModal.bind(this)}>
                <ModalHeader toggle={this.toggleNewProductModal.bind(this)}> Add New Product </ModalHeader>
                <ModalBody>
                    <FormGroup>
                        <Label for ="productName">Product Name</Label>
                        <Input 
                            id = "productName"
                            value ={this.state.newProductData.productName}
                            onChange={(e)=>{
                                let{newProductData}=this.state
                                newProductData.productName=e.target.value
                                this.setState({newProductData})
                            }}>
                            </Input>
                    </FormGroup>    
                    <FormGroup>
                        <Label for ="console">Console</Label>
                        <Input id = "console"
                         value ={this.state.newProductData.console}
                         onChange={(e)=>{
                             let{newProductData}=this.state
                             newProductData.console=e.target.value
                             this.setState({newProductData})
                         }}></Input>
                    </FormGroup> 
                    <FormGroup>
                        <Label for ="price">Price</Label>
                        <Input
                         id = "price"
                         value ={this.state.newProductData.price}
                         onChange={(e)=>{
                             let{newProductData}=this.state
                             newProductData.price=e.target.value
                             this.setState({newProductData})
                         }}></Input>
                    </FormGroup> 
                    <FormGroup enctype="multipart/form-data">
                        <Label for ="image">Image URL</Label>
                        <Input
                         id = "image"
                         value ={this.state.newProductData.image}
                         onChange={(e)=>{
                             let{newProductData}=this.state
                             newProductData.image=e.target.value
                             this.setState({newProductData})
                         }}></Input>
                    </FormGroup> 
                </ModalBody>
                <ModalFooter>
                
                    <Button color="primary" onClick={this.addProduct.bind(this)}>Add Product </Button>
                    <Button color="secondary" onClick={this.toggleNewProductModal.bind(this)}> Cancel </Button>

                </ModalFooter>
            </Modal>

            <Modal isOpen={this.state.updateProductModal} toggle={this.toggleUpdateProductModal.bind(this)}>
                <ModalHeader toggle={this.toggleUpdateProductModal.bind(this)}> Update Product </ModalHeader>
                <ModalBody>
                    <FormGroup>
                        <Label for ="productName">Product Name</Label>
                        <Input 
                            id = "productName"
                            value ={this.state.updateProductData.productName}
                            onChange={(e)=>{
                                let{updateProductData}=this.state
                                updateProductData.productName=e.target.value
                                this.setState({updateProductData})
                            }}>
                            </Input>
                    </FormGroup>    
                    <FormGroup>
                        <Label for ="console">Console</Label>
                        <Input id = "console"
                         value ={this.state.updateProductData.console}
                         onChange={(e)=>{
                             let{updateProductData}=this.state
                             updateProductData.console=e.target.value
                             this.setState({updateProductData})
                         }}></Input>
                    </FormGroup> 
                    <FormGroup>
                        <Label for ="price">Price</Label>
                        <Input
                         id = "price"
                         value ={this.state.updateProductData.price}
                         onChange={(e)=>{
                             let{updateProductData}=this.state
                             updateProductData.price=e.target.value
                             this.setState({updateProductData})
                         }}></Input>
                    </FormGroup> 
                    <FormGroup enctype="multipart/form-data">
                        <Label for ="image">image</Label>
                        <Input
                         id = "image"
                         value ={this.state.updateProductData.image}
                         onChange={(e)=>{
                             let{updateProductData}=this.state
                             updateProductData.image=e.target.value
                             this.setState({updateProductData})
                         }}></Input>
                    </FormGroup> 
                </ModalBody>
                <ModalFooter>
                
                    <Button color="primary" onClick={this.updateProduct.bind(this)}>Update Product </Button>
                    <Button color="secondary" onClick={this.toggleUpdateProductModal.bind(this)}> Cancel </Button>

                </ModalFooter>
            </Modal>
            
            <Table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Console</th>
                        <th>Price (RM)</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {products}
                </tbody>
            </Table>
        </div>
    );
}
}

    
if (document.getElementById('adminProduct')) {
    ReactDOM.render(<AdminProduct />, document.getElementById('adminProduct'));
}

