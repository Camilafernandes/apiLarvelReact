import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class Login extends React.Component {
    
    handleSubmit (event){
        event.preventDefault();
        console.log(event.target.email.value)


        fetch('http://localhost:8080/api/auth/login', {
            method: 'POST',
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                email: event.target.email.value,
                password: event.target.password.value,
            }),
        }).then((response) => response.json())
        .then((responseJson) => {
            console.log(responseJson.access_token)
            window.location = '/api/produtos?token='+responseJson.access_token;
        }).catch((error) => {
            console.error(error);
        })
    }
    
    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <form onSubmit={this.handleSubmit}>
                                <label>Email</label>
                                <input type="text" name="email"/>
                                
                                <label>Senha</label>
                                <input type="password" name="password"/>        

                                <input type="submit" value="Enviar"/>            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('login')) {
    ReactDOM.render(<Login />, document.getElementById('login'));
}
