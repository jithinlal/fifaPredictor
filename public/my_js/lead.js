const recentURL = 'https://fcctop100.herokuapp.com/api/fccusers/top/recent'
const alltimeURL = 'https://fcctop100.herokuapp.com/api/fccusers/top/alltime'


const ListItem = ({index, img, name, isRecent, recent, alltime}) => (
  <li key={name} className={index>3?'list-sm':'leader'}>
    <p className="list-index">{index}</p>
    <img src={img} className={index>3?'avatar avatar-sm':'avatar avatar-lg'}/>
    <div className="userinfo">
    <p className="username">{name}</p>
    <span className="brownies">
    {isRecent ? recent + " recent": alltime + " all-time"} / {' '}
    {isRecent ? alltime + " all-time" : recent + " recent"}
    </span>
    </div>
  </li>
)

class Header extends React.Component{
  render(){
    return (
		<div id="header">
        <div className="right">
    		<span>sort: </span>
          <span id="sort">
            <a href="#" onClick={this.props.sortRecent}>
              <span className={this.props.recent ? 'underline' : ''}>recent</span>
            </a> /{' '}
            <a href='#' onClick={this.props.sortAll}>
              <span className={this.props.recent ? '':'underline'}>all time</span>
            </a>
          </span>
        </div>
        <h3>
          <span>✧･ﾟ: *✧･ﾟ:* &nbsp;</span>
          Brownie Points
        <span>&nbsp;✧･ﾟ: *✧･ﾟ:*</span>
        </h3>
  		</div>
    )
  }
}

class UserList extends React.Component{
  constructor(props){
    super(props)
    this.state = {
      isRecent: true,
      dataRecent: [],
      dataAll: []
    }
    fetch(recentURL)
      .then(response => response.json())
      .then(data => this.setState({dataRecent: data}))

    fetch(alltimeURL)
      .then(response => response.json())
      .then(data => this.setState({dataAll: data}))

    this.sortRecent = this.sortRecent.bind(this)
    this.sortAll = this.sortAll.bind(this)
    this.getImg = this.getImg.bind(this)
  }
  sortRecent(){
    this.setState({isRecent: true})
  }
  sortAll(){
    this.setState({isRecent: false})
  }
  getImg(url, i){
    return i === 0 ? url + "&s=96"
    : i === 1 || i === 2 ? url + "&s=64"
    : url + "&s=32"
  }
	render(){
    const dataArr = this.state.isRecent ? this.state.dataRecent : this.state.dataAll
      return (
        <div>
        <Header
          recent={this.state.isRecent}
          sortRecent={this.sortRecent}
          sortAll={this.sortAll} />
      	<ul id="user-list">
        	{dataArr.map((user, index) => (
            <ListItem
              index={index + 1}
              img={this.getImg(user.img, index)}
              name={user.username}
              isRecent={this.state.isRecent}
              recent={user.recent}
              alltime={user.alltime} />
          ))}
        </ul>
        </div>
      )
    }
  }

class App extends React.Component{
  render(){
    return(
      <div>
    	  <UserList />
      </div>
    )
  }
}

 ReactDOM.render(<App />, document.getElementById('app'))
