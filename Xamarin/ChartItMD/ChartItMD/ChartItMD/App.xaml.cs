using System;
using Xamarin.Forms;
using Xamarin.Forms.Xaml;
using ChartItMD.Views;
using ChartMD.Models;
using ChartItMD.Models;

[assembly: XamlCompilation(XamlCompilationOptions.Compile)]
namespace ChartItMD
{
    public partial class App : Application
    {
        public static string HOSTNAME = "https://www.chartitmd.com/";
        public static string LASTERROR = "";
        public static Patient CURRENTPATIENT;
        public static PatientIDData CURRENTPATIENTIDDATA;
        public App()
        {
            InitializeComponent();

            MainPage = new LoginPage();
            //MainPage = new MainPage();
            DBConnection.LoadPatient("1");
        }

        protected override void OnStart()
        {
            // Handle when your app starts
        }

        protected override void OnSleep()
        {
            // Handle when your app sleeps
        }

        protected override void OnResume()
        {
            MainPage = new LoginPage();
            // Handle when your app resumes
        }
    }
}
