import { Component } from '@angular/core';
import { PollService } from './poll.service';
import { ZoomRoutingService } from './zoom-routing.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  public viewerList = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15'];
  public title = 'viewer-poll';
  constructor(private pollService: PollService,
    private zoomRoutingService: ZoomRoutingService) {

  }

  public onClick(numOfViewers: string|number) {
    if (numOfViewers === '0' || numOfViewers === 0) {
      this.pollService.goToUrl();
      return;
    }
    this.pollService.incrementViewerCount(numOfViewers);
  }

  public onElderQuorumClick() {
    this.zoomRoutingService.goToElderQuorum();
    return;
  }

  public onReliefSocietyClick() {
      this.zoomRoutingService.goToReliefSociety();
      return;
  }

  public onSundaySchoolClick() {
      this.zoomRoutingService.goToSundaySchool();
      return;
  }


}
