using ChartItMD.Models;
using System;
using System.Collections.Generic;

using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace ChartItMD.Views
{
    [XamlCompilation(XamlCompilationOptions.Compile)]
    public partial class MenuPage : ContentPage
    {
        MainPage RootPage { get => Application.Current.MainPage as MainPage; }
        List<HomeMenuItem> menuItems;
        public MenuPage()
        {
            InitializeComponent();

            menuItems = new List<HomeMenuItem>
            {
               
                
                new HomeMenuItem {Id = MenuItemType.OpenPatient, Title="Open Chart"},
                new HomeMenuItem {Id = MenuItemType.PatientProfile, Title="Patient Profile"},
                new HomeMenuItem {Id = MenuItemType.Orders, Title="Orders"},
                new HomeMenuItem {Id = MenuItemType.Medications, Title="Medications"},                
                new HomeMenuItem {Id = MenuItemType.LabReports, Title="Lab Reports"},
                new HomeMenuItem {Id = MenuItemType.DrNotes, Title="Physician's Notes"},
                new HomeMenuItem {Id = MenuItemType.NuresNotes, Title="Nure's Notes"},
                new HomeMenuItem {Id = MenuItemType.About, Title="About" }
            };

            ListViewMenu.ItemsSource = menuItems;

            ListViewMenu.SelectedItem = menuItems[0];
            ListViewMenu.ItemSelected += async (sender, e) =>
            {
                if (e.SelectedItem == null)
                    return;

                var id = (int)((HomeMenuItem)e.SelectedItem).Id;
                await RootPage.NavigateFromMenu(id);
            };
        }
    }
}