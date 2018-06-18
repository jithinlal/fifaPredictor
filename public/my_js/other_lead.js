$(document).ready(function () {
	// var urlRecent = 'https://fcctop100.herokuapp.com/api/fccusers/top/recent';
	var urlRecent = '/api/allTime';
	// var urlAllTime = 'https://fcctop100.herokuapp.com/api/fccusers/top/alltime';

	var userId = $('.getUser').data('userid');

	var App = React.createClass({
		getInitialState() {
			return {
				users: [],
				active: 'recent'
			}
		},
		getAndUpdateUsers: function (url, active) {
			$.getJSON(url, function (data) {
				this.setState({
					users: data.result,
					active: '' + active
				});
			}.bind(this));
		},
		// recentClick: function(e){
		//   this.getAndUpdateUsers(urlRecent, 'recent');
		// },
		// alltimeClick: function(e){
		//    this.getAndUpdateUsers(urlAllTime, 'allTime');
		// },
		componentDidMount: function () {
			this.getAndUpdateUsers(urlRecent, 'recent');
		},
		render: function () {
			return (
				<div>
					<table className="table">
						<tr>
							<th>#</th>
							<th>User Name</th>
							<th>Total Points <span className={this.state.active == 'recent' ? 'none' : ''}>&#9660;</span></th>
						</tr>
						{
							this.state.users.map(function (item, index) {
								return (
									<tr className={(item.id == userId ? 'userColor' : 'otherColor')}>
										<td>{index + 1}</td>
										<td><a href="javascript:;" target="_blank"> <img className="user-img" src={item.image_url} />{item.name}</a></td>
										<td>{item.points} </td>
									</tr>
								)
							})
						}
					</table>
				</div>

			)

		}
	});

	ReactDOM.render(<App />, document.getElementById('app'));

});