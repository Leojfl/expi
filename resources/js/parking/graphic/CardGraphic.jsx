import React from 'react';
import {Card, Button} from 'react-bootstrap';
import DatePicker from 'react-datepicker';
import {
    LineChart, Line, XAxis, YAxis, CartesianGrid, Tooltip, Legend
} from 'recharts';
import "react-datepicker/dist/react-datepicker.css";
import axios from 'axios';


const ANNUAL = 1;
const MONTHLY = 2;
const DAY = 3;
// Create our number formatter.
const formatter = new Intl.NumberFormat('es-MX', {
    style: 'currency',
    currency: 'MXN',
});

export default class CardGraphic extends React.Component {


    constructor(props) {
        super(props);
        this.onChangeFrequency = this.onChangeFrequency.bind(this);
        this.onAddData = this.onAddData.bind(this);
        this.onUpdateDate = this.onUpdateDate.bind(this);
        this.onRemoveData = this.onRemoveData.bind(this);
        this.getData = this.getData.bind(this);

        this.state = {
            frequency: 1,
            data: [],
            totals: [0],
            dates: [new Date()],
            labels: [],
            colors: [
                '#000000',
                '#121d86',
                '#18a59e',
                '#0fb63c',
                '#4d326f',
                '#6f6f6f',
                '#9d1311',
                '#e2b515',
                '#ae409a',
                '#6f7aae',
                '#21ae5e',
                '#000000',
                '#000000',
                '#000000',
                '#000000',
                '#000000',
                '#000000',
                '#000000',
            ]
        };
        this.getData();
    }

    render() {
        let width = document.getElementById('div-width').offsetWidth;
        return <Card className={' shadow'}>

            <div className={'row'}>
                {this.btnFrequency()}
                {this.calendarData()}
                <div className={'col-md-12 p-0'}>
                    <LineChart
                        width={width}
                        height={400}
                        data={this.state.data}
                        margin={{
                            top: 20, right: 30, left: 10, bottom: 10,
                        }}>
                        <CartesianGrid strokeDasharray="3 3"/>
                        <XAxis dataKey="name" height={60}/>
                        <YAxis/>
                        <Tooltip/>
                        <Legend/>
                        {this.state.labels.map((label, index) =>
                            <Line key={index} type="monotone" dataKey={label}
                                  stroke={this.state.colors[index]}
                                  strokeWidth={3}/>
                        )}
                    </LineChart>
                </div>
            </div>
        </Card>;
    }


    componentDidUpdate(prevProps, prevState, snapshot) {
        console.log(prevProps);
        if (prevState.dates !== this.state.dates ||
            prevState.frequency !== this.state.frequency ||
            prevProps.type !== this.props.type) {
            this.getData();
        }
    }

    btnFrequency() {
        return (<div className={'col-md-12 text-center my-1'}>
            <Button variant="primary"
                    className={'py-0 ml-1 mt-1' + ((this.state.frequency === ANNUAL) ? ' bg-light text-dark' : '')}
                    onClick={(e) => this.onChangeFrequency(ANNUAL)}>
                Anual
            </Button>
            <Button variant="primary"
                    className={'py-0 ml-1 mt-1' + ((this.state.frequency === MONTHLY) ? ' bg-light text-dark ' : ' ')}
                    onClick={(e) => this.onChangeFrequency(MONTHLY)}>
                Mensual
            </Button>
            <Button variant="primary"
                    className={'py-0 ml-1 mt-1 ' + ((this.state.frequency === DAY) ? ' bg-light text-dark ' : ' ')}
                    onClick={(e) => this.onChangeFrequency(DAY)}>
                Por día
            </Button>
            <br/>
        </div>)
    }

    calendarData() {
        return (this.state.dates.map((date, index) =>
            <div key={index} className={'col-md-12 text-center mt-1'}>
                <div className={'row m-0 mt-3'}>
                    <div className={'col-6 text-right'}>
                        <b>Total: {formatter.format(this.state.totals[index])}</b>
                    </div>
                    <div className={'col-6 text-left'}>
                        {this.makeDatePicker(index)}
                        {this.btnAddData(index)}
                    </div>
                </div>
            </div>
        ))
    }

    btnAddData(index) {
        if (index !== 0) {
            return <Button variant="primary"
                           className={'py-0 px-1 ml-1 mt-1 '}
                           onClick={(e) => this.onRemoveData(index)}>
                <i className="fas fa-minus-circle"></i>
            </Button>
        }
        return <Button variant="primary"
                       className={'py-0 px-1 ml-1 mt-1 '}
                       onClick={(e) => this.onAddData()}>
            <i className="fas fa-plus-circle"></i>
        </Button>
    }

    getData() {
        let url = document.getElementById('inp-url-graphic');
        let form = new FormData();
        form.append("type", this.props.type);
        form.append("frequency", this.state.frequency);
        form.append("dates", JSON.stringify(this.state.dates));
        axios.post(url.value, form)
            .then(res => {
                const data = res.data.data;
                let newData = [];
                for (let key in data) {
                    newData.push(data[key]);
                }
                console.log(newData);
                this.setState({
                    data: newData,
                    labels: res.data.labels,
                    totals: res.data.totals
                })
            })
    }

    makeDatePicker(index) {
        switch (this.state.frequency) {
            case ANNUAL :
                return <DatePicker
                    onChange={(date) => {
                        this.onUpdateDate(index, date)
                    }}
                    selected={this.state.dates[index]}
                    showYearPicker
                    dateFormat="yyyy"
                />
            case MONTHLY :
                return <DatePicker
                    onChange={(date) => {
                        this.onUpdateDate(index, date)
                    }}
                    selected={this.state.dates[index]}
                    showMonthYearPicker
                    dateFormat="MM/yyyy"
                />
            case DAY:
                return <DatePicker
                    onChange={(date) => {
                        this.onUpdateDate(index, date)
                    }}
                    selected={this.state.dates[index]}
                    dateFormat="dd/MM/yyyy"
                />
        }
    }

    onChangeFrequency(num) {
        this.setState({frequency: num})
    }

    onAddData() {
        let newDatas = this.state.dates.map((date) => date);
        newDatas.push(new Date());
        this.setState({dates: newDatas})
    }

    onRemoveData(index) {
        let newDatas = this.state.dates.map((date) => date);
        newDatas.splice(index, 1)
        this.setState({dates: newDatas})
    }

    onUpdateDate(index, newDate) {
        var dates = this.state.dates.map((date, i) => {
            if (index === i) {
                return newDate
            }
            return date
        });
        this.setState({dates: dates});
    }
}

