import React from 'react';
import {Button} from 'react-bootstrap';
import CardGraphic from "./CardGraphic";


export default class MenuGraphic extends React.Component {
    constructor(props) {
        super(props);
        this.onChangeType = this.onChangeType.bind(this);
        this.updateSize = this.updateSize.bind(this);
        window.addEventListener('resize', this.updateSize);
        this.state = {
            width: 0,
            type: 1,
            graphics: [1],
        };
    }

    updateSize() {
        this.setState({width: window.innerWidth});
    }

    render() {
        return <div className={'row'}>
            {this.actionsTypeGraphics()}
            {this.makeGraphics()}
        </div>;
    }

    actionsTypeGraphics() {
        return <div className={'col-md-12 text-right'}>
            <Button variant="primary" onClick={this.onChangeType}>
                {(this.state.type === 1) ? 'Ingresos monetarios' : 'Usuarios'}
            </Button>
        </div>
    }

    makeGraphics() {
        return this.state.graphics.map((graphic, index) =>
            <div key={index} className={'col-md-10 mx-auto mt-3 p-0'}>
                <CardGraphic
                    type={this.state.type}/>
            </div>
        );
    }

    onChangeType() {
        var newType = (this.state.type === 1) ? 2 : 1;
        this.setState({type: newType});
    }


}

