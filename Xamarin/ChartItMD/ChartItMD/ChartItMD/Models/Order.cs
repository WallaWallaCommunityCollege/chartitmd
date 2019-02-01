using System;
using System.Collections.Generic;
using System.Text;

namespace ChartMD.Models
{
    public class Order
    {
        public Int64 OrderId { get; set; } // PK
        public Int64 OrdererID { get; set; } // FK for the guy that put the order in
        public DateTime OrderedAT { get; set; }// time stamp of when the order was made
        public DateTime OrderedFor { get; set; }// what time the order is supposed to be completed
        public DateTime CompletedAT { get; set; }// what time was it realy completed
        public bool isCompleted { get; set; }// is the order completed
        public bool isAlarmed { get; set; }// should an alarm sound at ordered time?
        public bool isActive { get; set; }// is the order Active
        public string Description { get; set; }// Descrition of the order


    }
}
