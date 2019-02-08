using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using Xamarin.Forms;
using Xamarin.Forms.Xaml;
using ChartItMD.ViewModels;

namespace ChartItMD.Views
{
    
    [XamlCompilation(XamlCompilationOptions.Compile)]
    public partial class LoginPage : ContentPage
    {
        public LoginModel loginModel;
        

        public LoginPage()
        {
            InitializeComponent();
            
            loginModel = new LoginModel();
            MessagingCenter.Subscribe<LoginModel,string>(this, "LoginAlert",(sender,username) =>
            {
                DisplayAlert("", username, "oke");
            }); 
            this.BindingContext = loginModel;
            usernameEntry.Completed += (object sender, EventArgs e) =>
            {
                passwordEntry.Focus();
            };
            passwordEntry.Completed += (object sender, EventArgs e) =>
            {
                loginModel.SubmitCommand.Execute(null);
            };
        }
        

    }
}